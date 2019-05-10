<?php

namespace Diglabby\Doika\Providers;

use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

final class PaymentGatewayServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /** @inheritDoc */
    public function register(): void
    {
        $this->app->singleton(BePaidApiContext::class, function () {
            return new BePaidApiContext([
                'marketId' => setting('gateways.bePaid.marketId'),
                'marketKey' => setting('gateways.bePaid.marketKey'),
                'live' => setting('gateways.bePaid.live'),
            ]);
        });

        $this->app->bind(BePaidPaymentGateway::class, BePaidPaymentGateway::class);
    }

    /** @inheritDoc */
    public function provides(): array
    {
        return [
            BePaidApiContext::class,
            BePaidPaymentGateway::class,
        ];
    }
}
