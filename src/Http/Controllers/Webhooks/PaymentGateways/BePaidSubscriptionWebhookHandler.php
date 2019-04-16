<?php

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\DeleteCanceledSubscription;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers\CreateTransactionForProcessedSubscription;

/**
 * @see https://docs.bepaid.by/ru/webhooks
 */
final class BePaidSubscriptionWebhookHandler extends Controller
{
    /** @var array The event listener mappings */
    private $listen = [
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

        $status = $request->json('state');

        $handlers = $this->listen[$status] ?? [];

        foreach ($handlers as $handler) {
            resolve($handler)->handle($request);
        }

        return response('OK', Response::HTTP_OK);
    }
}
