<?php

namespace Diglabby\Doika\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BasicRouteServiceProvider;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends BasicRouteServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebhookRoutes();
        $this->mapWidgetRoutes();
        $this->mapDashboardRoutes();
    }

    protected function mapWebhookRoutes()
    {
        Route::middleware('api')
            ->prefix('doika/webhooks')
            ->group(base_path('routes/webhook.php'));
    }

    protected function mapWidgetRoutes()
    {
        Route::middleware(['api'])
            ->prefix('doika/widget/api')
            ->group(base_path('routes/widget_api.php'));

        Route::middleware('web')
            ->prefix('doika')
            ->group(base_path('routes/widget_ssr.php'));
    }

    protected function mapDashboardRoutes()
    {
        Route::middleware(['api', 'auth'])
            ->prefix('doika/dashboard/api')
            ->group(base_path('routes/dashboard_api.php'));

        Route::middleware(['web', 'localize'])
            ->prefix('doika/dashboard')
            ->group(base_path('routes/dashboard_ssr.php'));
    }
}
