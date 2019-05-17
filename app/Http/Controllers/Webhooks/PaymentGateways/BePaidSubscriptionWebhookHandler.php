<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\CreateSubscription;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\CreateTransactionForProcessedSubscription;
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
            CreateSubscription::class,
        ],
        'active' => [
            CreateTransactionForProcessedSubscription::class,
        ],
        'canceled' => [
            DeleteCanceledSubscription::class,
        ],
        'error' => [],
    ];

    public function __invoke(Request $request): Response
    {
        \Log::debug('bePaid donated webhook', ['headers' => $request->headers->all(), 'input' => $request->all()]);

        $event = $request->json('event') ?: $request->json('state');

        $handlers = $this->listen[$event] ?? [];

        foreach ($handlers as $handler) {
            resolve($handler)->handle($request);
        }

        return response('OK', Response::HTTP_OK);
    }
}
