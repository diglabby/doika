<?php

namespace Diglabby\Doika\Http\Middleware;

use Illuminate\Http\Request;
use Diglabby\Doika\Exceptions\WebhookFailed;

final class VerifyBePaidSignature
{
    /**
     * @throws WebhookFailed
     */
    public function handle(Request $request, \Closure $next)
    {
        if (! $request->headers->has('AUTHORIZATION')) {
            throw WebhookFailed::missingAuthorization();
        }

        if (stripos($request->headers->get('AUTHORIZATION'), 'basic') !== 0) {
            throw WebhookFailed::invalidAuthorization();
        }

        $marketIdFromRequest = (string) $request->headers->get('PHP_AUTH_USER');
        $isValidMarketId = $marketIdFromRequest === (string) config('services.bepaid.marketId');
        if (! $isValidMarketId) {
            throw WebhookFailed::invalidMarket($marketIdFromRequest);
        }

        $marketKeyFromRequest = $request->headers->get('PHP_AUTH_PW');
        $isValidMarketKey = $marketKeyFromRequest === config('services.bepaid.marketKey');
        if (! $isValidMarketKey) {
            throw WebhookFailed::invalidMarketKey($marketKeyFromRequest);
        }

        return $next($request);
    }
}
