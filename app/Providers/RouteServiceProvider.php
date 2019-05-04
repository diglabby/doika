<?php

namespace Diglabby\Doika\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as BasicRouteServiceProvider;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends BasicRouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Diglabby\Doika\Http\Controllers';

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
            ->namespace($this->namespace)
            ->group(base_path('routes/webhook.php'));
    }

    protected function mapWidgetRoutes()
    {
        Route::middleware(['api'])
            ->prefix('doika/widget/api')
            ->namespace($this->namespace)
            ->group(base_path('routes/widget_api.php'));

        Route::middleware('web')
            ->prefix('doika/widget')
            ->namespace($this->namespace)
            ->group(base_path('routes/widget.php'));
    }

    protected function mapDashboardRoutes()
    {
        Route::middleware(['api'])
            ->prefix('doika/dashboard/api')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard_api.php'));

        Route::middleware(['web'])
            ->prefix('doika/dashboard')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard_ssr.php'));
    }
}
