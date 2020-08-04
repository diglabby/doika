<?php

namespace Diglabby\Doika\Http\Middleware;

use Diglabby\Doika\Exceptions\WebhookFailed;
use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Illuminate\Http\Request;

final class VerifyBePaidSignature
{
    /** @var BePaidApiContext */
    private $apiContext;

    public function __construct(BePaidApiContext $apiContext)
    {
        $this->apiContext = $apiContext;
    }

    /**
     * @throws WebhookFailed
     */
    public function handle(Request $request, \Closure $next)
    {
        if (!$request->headers->has('AUTHORIZATION')) {
            throw WebhookFailed::missingAuthorization();
        }

        if (stripos($request->headers->get('AUTHORIZATION'), 'basic') !== 0) {
            throw WebhookFailed::invalidAuthorization();
        }

        $marketIdFromRequest = (string) $request->headers->get('PHP_AUTH_USER');
        $isValidMarketId = $marketIdFromRequest === (string) $this->apiContext->marketId;
        if (!$isValidMarketId) {
            throw WebhookFailed::invalidMarket($marketIdFromRequest);
        }

        $marketKeyFromRequest = $request->headers->get('PHP_AUTH_PW');
        $isValidMarketKey = $marketKeyFromRequest === $this->apiContext->marketKey;
        if (!$isValidMarketKey) {
            throw WebhookFailed::invalidMarketKey($marketKeyFromRequest);
        }

        return $next($request);
    }
}
