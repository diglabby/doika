<?php
/**
 * URIs prefixed by /doika/dashboard.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapDashboardRoutes()
 * Applied middleware groups: web
 */

use Diglabby\Doika\Http\Controllers\Dashboard\Auth\LoginController;
use Diglabby\Doika\Http\Controllers\Dashboard\SpaLayoutController;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('doika/dashboard/campaigns');
})->name('dashboard.home')->middleware(['auth']);

Route::get('/{any}', [SpaLayoutController::class, 'show'])->where('any', '[\/\w\.-]*')
    ->name('dashboard.spa-layout.show')
    ->middleware(['auth']);
