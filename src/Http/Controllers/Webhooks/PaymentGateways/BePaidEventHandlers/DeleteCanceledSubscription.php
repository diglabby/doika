<?php

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Illuminate\Http\Request;
use Diglabby\Doika\Models\Subscription;

/**
 * @see https://docs.bepaid.by/ru/webhooks#a-idcanceled-subscriptiona--
 */
final class DeleteCanceledSubscription
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

        $subscription->delete();
    }
}
