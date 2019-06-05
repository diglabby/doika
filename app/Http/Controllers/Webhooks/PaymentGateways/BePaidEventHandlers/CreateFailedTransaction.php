<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Mail\SubscriptionChargeFailed;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class CreateFailedTransaction
{
    public function handle(Request $request): void
    {
        /** @var Subscription $subscription */
        $subscription = Subscription::query()
            ->where('payment_gateway_subscription_id', $request->json('id'))
            ->where('payment_gateway', 'bePaid')
            ->withTrashed()
            ->firstOrFail();

        $transaction = new Transaction([
            'amount' => $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'campaign_id' => $request->json('additional_data.campaign_id'),
            'subscription_id' => $subscription->id,
            'donator_id' => $request->json('additional_data.donator_id'),
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => $request->json('last_transaction.uid'),
            'status' => Transaction::STATUS_FAILED,
            'status_message' => $request->json('last_transaction.message'),
        ]);
        $transaction->save();

        // @todo dispatch an Event instead and send from a Listener
        Mail::to($transaction->donator)
            ->send(new SubscriptionChargeFailed($subscription, $transaction));
    }
}
