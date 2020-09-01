<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Carbon\CarbonInterval;
use Diglabby\Doika\Mail\SubscriptionSuccessfullyCharged;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class CreateSubscriptionWithTransaction
{
    public function handle(Request $request): void
    {
        $interval = CarbonInterval::fromString($request->json('plan.plan.interval').' '.$request->json('plan.plan.interval_unit'));

        $subscription = new Subscription([
            'donator_id' => $request->json('additional_data.donator_id'),
            'campaign_id' => $request->json('additional_data.campaign_id'),
            'payment_gateway' => BePaidPaymentGateway::GATEWAY_ID,
            'payment_gateway_subscription_id' => $request->json('id'),
            'amount' => (int) $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'payment_interval' => $interval->spec(),
        ]);
        $subscription->save();

        $transaction = new Transaction([
            'amount' => $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'campaign_id' => $subscription->campaign->id,
            'donator_id' => $subscription->donator_id,
            'subscription_id' => $subscription->id,
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => $request->json('last_transaction.uid'),
            'status' => Transaction::STATUS_SUCCESSFUL,
            'status_message' => $request->json('last_transaction.message'),
        ]);
        $transaction->save();

        // @todo dispatch an Event instead and send from a Listener
        Mail::to($subscription->donator)
            ->send(new SubscriptionSuccessfullyCharged($subscription, $transaction));
    }
}
