<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

use Carbon\CarbonInterval;
use Diglabby\Doika\Exceptions\InvalidConfigException;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Money\Money;

/**
 * @see https://docs.bepaid.by/ru/introduction
 */
final class BePaidPaymentGateway implements OffsitePaymentGateway
{
    private const GATEWAY_ID = 'bePaid';
    private const API_VERSION = '2.1';
    private const API_ENDPOINT = 'https://api.bepaid.by';

    /** @var BePaidApiContext */
    private $apiContext;

    /** @var HttpClient */
    private $httpClient;

    public function __construct(BePaidApiContext $apiContext, HttpClient $httpClient)
    {
        $this->apiContext = $apiContext;
        $this->httpClient = $httpClient;
    }

    /** @inheritDoc */
    public function getGatewayId(): string
    {
        return self::GATEWAY_ID;
    }

    /**
     * {@inheritDoc}
     * @see https://docs.bepaid.by/ru/checkout/payment-token
     */
    public function tokenizePaymentIntend(Money $money, Donator $donator, Campaign $campaign): string
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
                    'language' => app()->getLocale(),
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

        $httpClient = new HttpClient(['base_uri' => 'https://checkout.bepaid.by']);
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

        /** @var array $paymentData */
        $paymentData = json_decode($response->getBody()->getContents(), true)->checkout->token;

        return $paymentData['checkout']['redirect_url'];
    }

    /**
     * Subscribe a Donator to a Campaign
     * @see https://docs.bepaid.by/ru/subscriptions/intro
     */
    public function tokenizeSubscriptionIntend(Donator $donator, Campaign $campaign, Money $money, string $paymentInterval): string
    {
        $dateInterval = new CarbonInterval($paymentInterval);
        $planName = ((int) $money->getAmount() / 100)."{$money->getCurrency()->getCode()} для {$campaign->name}";

        $getSubscriptionParams = [
            'plan' => [
                'test' => ! $this->apiContext->live,
                'title' => $planName,
                'currency' => $money->getCurrency()->getCode(),
                'plan' => [
                    'amount' => (int) $money->getAmount(),
                    'interval' => $dateInterval->months,
                    'interval_unit' => 'month', // hour, day, month
                ],
            ],
            'return_url' => url('/', ['gateway' => $this->getGatewayId()]),
            'notification_url' => route('webhooks.bepaid.subscriptions'),
            'settings' => [
                'language' => app()->getLocale(),
            ],
        ];
        $response = $this->httpClient->request('POST', self::API_ENDPOINT.'/subscriptions', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $getSubscriptionParams,
            'verify' => false,
        ]);

        /** @var array $subscriptionData */
        $subscriptionData = json_decode($response->getBody()->getContents(), true);

        return $subscriptionData['redirect_url'];
    }
}
