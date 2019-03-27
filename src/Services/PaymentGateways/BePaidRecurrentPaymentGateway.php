<?php

namespace Diglabby\Doika\Services\PaymentGateways;

use Carbon\CarbonInterval;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use GuzzleHttp\Client as HttpClient;
use Money\Money;

final class BePaidRecurrentPaymentGateway
{
    private const GATEWAY_ID = 'bePaid';

    /** @deprecated */
    private const COUNTRY_OWNER = 'BY';

    /** @deprecated */
    private const DEFAULT_VALUE = 'default';

    private const BASE_PAYMENT_GATEWAY_URI = 'https://api.bepaid.by';

    /** @deprecated */
    private const REDIRECT_URL = 'https://doika.falanster.by';

    private $apiContext;

    private $httpClient;

    public function __construct(BePaidApiContext $apiContext, HttpClient $httpClient)
    {
        $this->apiContext = $apiContext;
        $this->httpClient = $httpClient;
    }

    /**
     * @see https://docs.bepaid.by/ru/subscriptions/customers
     */
    private function createCustomer(Donator $donator): string
    {
        $GetCustomerParams = [
            'test' => ! $this->apiContext->live,
//            'first_name' => $donator->name,
//            'last_name' => '',
            'email' => $donator->email,
            'phone' => $donator->phone,
            'country' => self::COUNTRY_OWNER,
            'ip' => self::DEFAULT_VALUE,
//            'city' => self::DEFAULT_VALUE,
//            'address' => self::DEFAULT_VALUE,
            'zip' => self::DEFAULT_VALUE,
        ];
        $response = $this->httpClient->request('POST', self::BASE_PAYMENT_GATEWAY_URI.'/customers', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $GetCustomerParams,
            'verify' => false,
        ]);

        return json_decode($response->getBody()->getContents())->id;
    }

    private function generatePlanName(Money $money, Campaign $campaign): string
    {
        return "Campaign: $campaign->name, {$money->getCurrency()->getCode()} {$money->getAmount()}";
    }

    /**
     * @see https://docs.bepaid.by/ru/subscriptions/plans
     */
    private function createPlan(Money $money, Campaign $campaign, CarbonInterval $dateInterval): string
    {
        $planName = $this->generatePlanName($money, $campaign);

        $getTokenParams = [
            'test' => ! $this->apiContext->live,
            'title' => $planName,
            'currency' => $money->getCurrency()->getCode(),
            'plan' => [
                'amount' => (int) $money->getAmount(),
                'interval' => $dateInterval->months,
                'interval_unit' => 'month',
            ],
            'language' => app()->getLocale(),
            'infinite' => true,
        ];
        $response = $this->httpClient->request('POST', self::BASE_PAYMENT_GATEWAY_URI.'/plans', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $getTokenParams,
            'verify' => false,
        ]);

        return json_decode($response->getBody()->getContents())->id;
    }

    public function createSubscription(Money $money, Campaign $campaign, Donator $donator, string $paymentInterval): Subscription
    {
        $dateInterval = new CarbonInterval($paymentInterval);
        $planId = $this->createPlan($money, $campaign, $dateInterval);
        $customerId = $this->createCustomer($donator);

        $getSubscriptionParams = [
            'customer' => [
                'id' => $customerId,
            ],
            'plan' => [
                'id' => $planId,
            ],
            'return_url' => self::REDIRECT_URL,
            'settings' => [
                'language' => app()->getLocale(),
            ]
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
