<?php
/**
 * URIs prefixed by /doika/dashboard
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapDashboardRoutes()
 * Applied middleware groups: web
 */

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('doika/dashboard/campaigns');
})->name('dashboard.home')->middleware(['auth']);

Route::get('/{any}', 'Dashboard\SpaLayoutController@show')->where('any', '[\/\w\.-]*')
    ->name('dashboard.spa-layout.show')
    ->middleware(['auth']);
