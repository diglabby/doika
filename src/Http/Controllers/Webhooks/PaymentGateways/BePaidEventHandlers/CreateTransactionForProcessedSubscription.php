<?php

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Http\Request;

/**
 * @see https://docs.bepaid.by/ru/webhooks#a-idactive-or-renewed-subscriptiona--
 */
final class CreateTransactionForProcessedSubscription
{
    public function handle(Request $request): void
    {
        /** @var Subscription|null $subscription */
        $subscription = Subscription::query()
            ->where('payment_gateway', 'bePaid')
            ->where('payment_gateway_subscription_id', $request->json('id'))
            ->first();

        if (! $subscription) {
            \Log::alert('Webhook event received for unknown subscription', $request->all());
            return;
        }

        $transaction = new Transaction([
            'amount' => $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'campaign_id' => $subscription->id,
            'donator_id' => $subscription->donator_id,
            'subscription_id' => $subscription->id,
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => $request->json('last_transaction.uid'),
            'status' => Transaction::STATUS_SUCCESSFUL,
            'status_message' => $request->json('last_transaction.message'),
        ]);
        $transaction->save();
    }
}
