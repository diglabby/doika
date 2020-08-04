<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Mail\SubscriptionSuccessfullyCharged;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class CreateTransactionForRenewedSubscription
{
    public function handle(Request $request): void
    {
        /** @var Subscription|null $subscription */
        $subscription = Subscription::query()
            ->where('payment_gateway_subscription_id', $request->json('id'))
            ->where('payment_gateway', 'bePaid')
            ->withTrashed()
            ->first();

        if (!$subscription) {
            \Log::alert("Webhook {$request->json('event')} received for unknown subscription: ", $request->all());

            return;
        }

        if (!$request->json('state') !== 'active') {
            \Log::alert("Webhook {$request->json('event')} received for non-active transaction: ", $request->all());

            return;
        }

        $transaction = new Transaction([
            'amount'                         => $request->json('plan.plan.amount'),
            'currency'                       => $request->json('plan.currency'),
            'campaign_id'                    => $subscription->campaign->id,
            'donator_id'                     => $subscription->donator_id,
            'subscription_id'                => $subscription->id,
            'payment_gateway'                => 'bePaid',
            'payment_gateway_transaction_id' => $request->json('last_transaction.uid'),
            'status'                         => Transaction::STATUS_SUCCESSFUL,
            'status_message'                 => $request->json('last_transaction.message'),
        ]);
        $transaction->save();

        // @todo dispatch an Event instead and send from a Listener
        Mail::to($subscription->donator)
            ->send(new SubscriptionSuccessfullyCharged($subscription, $transaction));
    }
}
