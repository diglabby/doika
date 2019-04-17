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

    private const BASE_PAYMENT_GATEWAY_URI = 'https://api.bepaid.by';

    private $apiContext;

    private $httpClient;

    public function __construct(BePaidApiContext $apiContext, HttpClient $httpClient)
    {
        $this->apiContext = $apiContext;
        $this->httpClient = $httpClient;
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
