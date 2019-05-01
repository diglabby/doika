<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

use Carbon\CarbonInterval;
use Diglabby\Doika\Exceptions\InvalidConfigException;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Money\Money;

final class BePaidPaymentGateway implements OffsitePaymentGateway
{
    private const GATEWAY_ID = 'bePaid';
    private const API_VERSION = '2.1';
    private const BASE_API_URI = 'https://checkout.bepaid.by';
    private const BASE_PAYMENT_GATEWAY_URI = 'https://api.bepaid.by';

    /** @var ConfigRepository */
    private $config;
    /** @var BePaidApiContext */
    private $apiContext;
    /** @var HttpClient */
    private $httpClient;

    public function __construct(BePaidApiContext $apiContext, ConfigRepository $config, HttpClient $httpClient)
    {
        $this->apiContext = $apiContext;
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    /**
     * {@inheritDoc}
     * @see https://docs.bepaid.by/ru/checkout/payment-token
     */
    public function tokenizePayment(Money $money, Donator $donator, Campaign $campaign): string
    {
        if ($money->getAmount() < 1) {
            throw new \InvalidArgumentException('Amount should be a positive number');
        }

        $checkoutParams = [
            'checkout' => [
                'test' => ! $this->apiContext->live,
                'transaction_type' => 'payment',
                'version' => self::API_VERSION,
                'attempts' => 3,
                'settings' => [
                    'success_url' => route('widget.campaign.donation-result', ['campaign' => $campaign->id, 'status' => 'success']),
                    'decline_url' => route('widget.campaign.donation-result', ['campaign' => $campaign->id, 'status' => 'decline']),
                    'fail_url' => route('widget.campaign.donation-result', ['campaignId' => $campaign->id, 'status' => 'fail']),
                    'notification_url' => route('webhooks.bepaid.donated', [$campaign->id]),
                    'language' => $this->config->get('app.locale'),
                ],
                'order' => [
                    'amount' => $money->getAmount(),
                    'currency' => $money->getCurrency()->getCode(),
                    'description' => sprintf('Donation for "%s" campaign', $campaign->name),
                ],
                'customer' => [
                    'email' => $donator->email,
                ],
            ],
        ];

        $httpClient = new HttpClient(['base_uri' => self::BASE_API_URI]);
        try {
            $response = $httpClient->request('POST', '/ctp/api/checkouts', [
                'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
                'headers' => ['Accept' => 'application/json'],
                'json' => $checkoutParams,
            ]);
        } catch (ClientException $exception) {
            throw new InvalidConfigException("Invalid API request: {$exception->getMessage()}", $exception->getCode(), $exception);
        } catch (GuzzleException $exception) {
            throw new \DomainException($exception->getMessage(), $exception->getCode(), $exception);
        }

        /** @var string $paymentToken */
        $paymentToken = json_decode($response->getBody()->getContents())->checkout->token;

        return $paymentToken;
    }

    private function generatePlanName(Money $money, Campaign $campaign): string
    {
        return "Campaign: $campaign->name, {$money->getCurrency()->getCode()} {$money->getAmount()}";
    }

    public function createSubscription(Money $money, Campaign $campaign, Donator $donator, string $paymentInterval): Subscription
    {
        $dateInterval = new CarbonInterval($paymentInterval);
        $planName = $this->generatePlanName($money, $campaign);

        $getSubscriptionParams = [
            'plan' => [
                'test' => ! $this->apiContext->live,
                'title' => $planName,
                'currency' => $money->getCurrency()->getCode(),
                'plan' => [
                    'amount' => (int) $money->getAmount(),
                    'interval' => $dateInterval->months,
                    'interval_unit' => 'month',
                ],
            ],
            'return_url' => url('/'),
            'notification_url' => route('webhooks.bepaid.subscriptions'),
            'settings' => [
                'language' => app()->getLocale(),
            ],
        ];
        $response = $this->httpClient->request('POST', self::BASE_PAYMENT_GATEWAY_URI.'/subscriptions', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $getSubscriptionParams,
            'verify' => false,
        ]);

        $gatewaySubscriptionId = json_decode($response->getBody()->getContents())->id;

        $subscription = new Subscription([
            'donator_id' => $donator->id,
            'campaign_id' => $campaign->id,
            'payment_gateway' => self::GATEWAY_ID,
            'payment_gateway_subscription_id' => $gatewaySubscriptionId,
            'amount' => (int) $money->getAmount(),
            'currency' => $money->getCurrency()->getCode(),
            'payment_interval' => $paymentInterval,
        ]);
        $subscription->save();

        return $subscription;
    }
}
