<?php

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Http\Request;

final class CreateSubscription
{
    public function handle(Request $request): void
    {
        $subscription = new Subscription([
            'donator_id' => $request->json('additional_data.donator_id'),
            'campaign_id' => $request->json('additional_data.campaign_id'),
            'payment_gateway' => BePaidPaymentGateway::GATEWAY_ID,
            'payment_gateway_subscription_id' => $request->json('id'),
            'amount' => (int) $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'payment_interval' => 'P'
                .$request->json('plan.plan.interval')
                .ucfirst($request->json('plan.plan.interval_unit')[0]), // P1M
        ]);
        $subscription->save();
    }
}
