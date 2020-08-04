<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Models\Subscription;
use Illuminate\Http\Request;

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
            ->withTrashed()
            ->first();

        if (!$subscription) {
            \Log::alert("Webhook {$request->json('event')} received for unknown subscription", $request->all());

            return;
        }

        if ($subscription->isCanceled()) {
            // We already know that it's canceled, probably canceled it from Doika
            return;
        }

        // It was not canceled from Doika, sync the state with gateway
        // Don't use $subscription->cancel() here!
        $subscription->delete();
    }
}
