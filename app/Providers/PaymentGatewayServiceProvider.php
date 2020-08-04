<?php

namespace Diglabby\Doika\Providers;

use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

final class PaymentGatewayServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /** {@inheritdoc} */
    public function register(): void
    {
        $this->app->singleton(BePaidApiContext::class, function () {
            return new BePaidApiContext([
                'marketId'  => setting('gateway_bePaid_idMarket'),
                'marketKey' => setting('gateway_bePaid_keyMarket'),
                'mode'      => setting('gateway_bePaid_mode') === 'live' ? 'live' : 'test',
            ]);
        });

        $this->app->bind('bePaid', BePaidPaymentGateway::class);
        $this->app->bind(BePaidPaymentGateway::class, BePaidPaymentGateway::class);
    }

    /** {@inheritdoc} */
    public function provides(): array
    {
        return [
            BePaidApiContext::class,
            'bePaid',
            BePaidPaymentGateway::class,
        ];
    }
}
