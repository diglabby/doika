<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

use Carbon\CarbonInterval;
use Diglabby\Doika\Exceptions\InvalidConfigException;
use Diglabby\Doika\Exceptions\UnexpectedGatewayResponse;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\SubscriptionIntend;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ServerException;
use Money\Money;

/**
 * @see https://docs.bepaid.by/ru/introduction
 */
final class BePaidPaymentGateway implements OffsitePaymentGateway, SupportsSubscriptionsGateway
{
    public const GATEWAY_ID = 'bePaid';

    private const API_VERSION = '2.1';
    private const API_ENDPOINT = 'https://api.bepaid.by';

    private const CHECKOUT_ENDPOINT = 'https://checkout.bepaid.by';

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
                'test' => $this->apiContext->isTest(),
                'transaction_type' => 'payment',
                'version' => self::API_VERSION,
                'attempts' => 3,
                'settings' => [
                    'success_url' => route('widget.campaigns.donation-result', ['campaign' => $campaign->id, 'status' => 'success']),
                    'decline_url' => route('widget.campaigns.donation-result', ['campaign' => $campaign->id, 'status' => 'decline']),
                    'fail_url' => route('widget.campaigns.donation-result', ['campaignId' => $campaign->id, 'status' => 'fail']),
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

        try {
            $response = $this->httpClient->request('POST', self::CHECKOUT_ENDPOINT.'/ctp/api/checkouts', [
                'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
                'headers' => ['Accept' => 'application/json'],
                'json' => $checkoutParams,
            ]);
        } catch (ClientException $exception) {
            throw new InvalidConfigException("Invalid API request: {$exception->getMessage()}", $exception->getCode(), $exception);
        } catch (ServerException $exception) {
            throw UnexpectedGatewayResponse::withBody($exception->getMessage(), $exception);
        } catch (GuzzleException $exception) {
            throw new \DomainException('Unknown Guzzle HTTP client error', null, $exception);
        }

        /** @var array $paymentData */
        $paymentData = json_decode($response->getBody()->getContents(), true);

        return $paymentData['checkout']['redirect_url'];
    }

    /**
     * Subscribe a Donator to a Campaign
     * @see https://docs.bepaid.by/ru/subscriptions/intro
     */
    public function tokenizeSubscriptionIntend(SubscriptionIntend $subscriptionIntend): string
    {
        $getSubscriptionParams = [
            'plan' => [
                'test' => $this->apiContext->isTest(),
                'title' => $subscriptionIntend->getPlanName(),
                'currency' => $subscriptionIntend->money->getCurrency()->getCode(),
                'plan' => array_merge(
                    ['amount' => (int) $subscriptionIntend->money->getAmount()],
                    $this->parseDateInterval($subscriptionIntend->getInterval())
                ),
                'infinite' => false,
                'billing_cycles' => $subscriptionIntend->getBillingCyclesCount(),
            ],
            'return_url' => route('widget.campaigns.donation-result', [
                'campaign' => $subscriptionIntend->campaign,
                'status' => 'subscribed',
            ]),
            'notification_url' => route('webhooks.bepaid.subscriptions'),
            'additional_data' => [
                'campaign_id' => $subscriptionIntend->campaign->id,
                'donator_id' => $subscriptionIntend->donator->id,
            ],
            'settings' => [
                'language' => app()->getLocale(),
            ],
            'number_payment_attempts' => 5, // Default: 3
        ];

        try {
            $response = $this->httpClient->request('POST', self::API_ENDPOINT.'/subscriptions', [
                'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
                'headers' => ['Accept' => 'application/json'],
                'json' => $getSubscriptionParams,
                'verify' => false,
            ]);
        } catch (ClientException $exception) {
            throw new InvalidConfigException("Invalid API request: {$exception->getMessage()}", $exception->getCode(), $exception);
        } catch (ServerException $exception) {
            throw UnexpectedGatewayResponse::withBody($exception->getMessage(), $exception);
        } catch (GuzzleException $exception) {
            throw new \DomainException('Unknown Guzzle HTTP client error', null, $exception);
        }

        /** @var array $subscriptionData */
        $subscriptionData = json_decode($response->getBody()->getContents(), true);

        return $subscriptionData['redirect_url'];
    }

    /**
     * Parse CarbonInterval into bePaid format
     * @see https://docs.bepaid.by/ru/subscriptions/plans
     * @param CarbonInterval $interval
     * @return array
     */
    private function parseDateInterval(CarbonInterval $interval): array
    {
        $isMatched = preg_match('/^P[T]?  (\d+)   ([HDM]) $/x', $interval->spec(), $intervalParts);
        if ($isMatched === false || $isMatched === 0) {
            throw new \InvalidArgumentException('Unprocessable payment interval: '.$interval->spec());
        }

        [$intervalAsSpec, $intervalSize, $intervalUnit] = $intervalParts;

        switch ($intervalUnit) {
            case 'M':
                $convertedIntervalUnit = 'month';
                break;
            case 'D':
                $convertedIntervalUnit = 'day';
                break;
            case 'H':
                $convertedIntervalUnit = 'hour';
                break;
            default:
                throw new \InvalidArgumentException("Unprocessable payment interval: {$interval->spec()}, unit: $intervalUnit");
        }

        return [
            'interval' => (int) $intervalSize,
            'interval_unit' => $convertedIntervalUnit, // hour|day|month
        ];
    }

    /**
     * Cancel existing subscription
     * https://docs.bepaid.by/ru/subscriptions/subscriptions#a-idcancel-subscriptiona--
     */
    public function unsubscribe(Subscription $subscription, string $reason): void
    {
        if ($subscription->payment_gateway !== $this->getGatewayId()) {
            throw new \InvalidArgumentException('Unexpected subscription to cancel');
        }

        $payload = [
            'cancel_reason' => $reason,
        ];

        $response = $this->httpClient->request(
            'POST',
            self::API_ENDPOINT."/subscriptions/{$subscription->payment_gateway_subscription_id}/cancel",
            [
                'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
                'headers' => ['Accept' => 'application/json'],
                'json' => $payload,
            ]
        );

        $responseBody = $response->getBody()->getContents();
        $subscriptionData = json_decode($responseBody, true);
        if ($subscriptionData['state'] !== 'canceled') {
            throw UnexpectedGatewayResponse::withBody($responseBody);
        }
    }
}
