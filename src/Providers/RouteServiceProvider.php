<?php

namespace Diglabby\Doika\Providers;

use App\Providers\RouteServiceProvider as BasicRouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends BasicRouteServiceProvider
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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->laravelNamespace)
            ->group(base_path('routes/web.php'));

        Route::middleware(['web', 'locale', 'localize'])
            ->prefix(LaravelLocalization::setLocale())
            ->namespace($this->namespace)
            ->group(base_path('routes/public.php'));
/*
        Route::middleware(['web', 'locale'])
            ->prefix(LaravelLocalization::setLocale())
            ->namespace($this->laravelNamespace)
            ->group(base_path('routes/auth.php'));

        Route::middleware(['web', 'locale', 'auth', 'can:access backend'])
            ->prefix(LaravelLocalization::setLocale().'/'.config('app.admin_path'))
            ->namespace($this->laravelNamespace.'\Backend')
            ->as('admin.')
            ->group(base_path('routes/admin.php'));*/

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
