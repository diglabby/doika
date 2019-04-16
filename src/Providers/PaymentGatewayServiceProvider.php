<?php

namespace Diglabby\Doika\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;

final class PaymentGatewayServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /** {@inheritdoc} */
    public function register(): void
    {
        $this->app->singleton(BePaidApiContext::class, function () {
            return new BePaidApiContext([
                'marketId' => config('services.bepaid.marketId'),
                'marketKey' => config('services.bepaid.marketKey'),
                'live' => config('services.bepaid.live'),
            ]);
        });

        $this->app->bind(BePaidPaymentGateway::class, BePaidPaymentGateway::class);
    }

    /** {@inheritdoc} */
    public function provides(): array
    {
        return [
            BePaidApiContext::class,
            BePaidPaymentGateway::class,
        ];
    }
}
