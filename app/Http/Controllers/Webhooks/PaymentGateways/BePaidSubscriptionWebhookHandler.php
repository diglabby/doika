<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\CreateFailedTransaction;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\CreateSubscriptionWithTransaction;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\DeleteCanceledSubscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @see https://docs.bepaid.by/ru/webhooks
 */
final class BePaidSubscriptionWebhookHandler extends Controller
{
    /** @var array The event listener mappings */
    private $listen = [
        'created.subscription' => [
            CreateSubscriptionWithTransaction::class,
        ],
        'failed.subscription' => [
            CreateFailedTransaction::class,
        ],
        'renewed.subscription' => [
            // @todo implement it: create a Transaction and send an email
        ],
        'canceled.subscription' => [
            DeleteCanceledSubscription::class,
        ],
    ];

    public function __invoke(Request $request): Response
    {
        $event = $request->json('event') ?: $request->json('state');

        \Log::debug("bePaid webhook event $event:", $request->all());

        $handlers = $this->listen[$event] ?? [];

        foreach ($handlers as $handler) {
            resolve($handler)->handle($request);
        }

        return response('OK', Response::HTTP_OK);
    }
}
