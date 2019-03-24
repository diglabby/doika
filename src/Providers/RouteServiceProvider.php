<?php

namespace Diglabby\Doika\Providers;

use App\Providers\RouteServiceProvider as BasicRouteServiceProvider;
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

    /** @var string */
    protected $laravelNamespace = 'App\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWidgetRoutes();
        $this->mapDashboardRoutes();
        $this->mapRedirectRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapWidgetRoutes()
    {
        Route::middleware('web')
            ->prefix('doika')
            ->namespace($this->namespace)
            ->group(base_path('routes/widget.php'));
    }

    protected function mapDashboardRoutes()
    {
        Route::middleware(['web'])
            ->prefix('doika/dashboard/')
            ->namespace($this->laravelNamespace)
            ->group(base_path('routes/auth.php'));

        Route::middleware(['web', 'auth'])
            ->prefix('doika/dashboard/')
            ->namespace($this->namespace)
            ->group(base_path('routes/dashboard.php'));
    }

    protected function mapRedirectRoutes()
    {
        Route::middleware(['web'])
            ->namespace($this->namespace)
            ->group(base_path('routes/redirects.php'));
    }
}
