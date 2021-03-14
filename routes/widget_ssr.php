<?php
/**
 * URIs prefixed by /doika.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: web
 */

use Diglabby\Doika\Http\Controllers\Widget\SpaLayoutController;
use Diglabby\Doika\Http\Controllers\Widget\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/subscriptions/cancel', [SubscriptionController::class, 'delete'])
    ->name('widget.subscriptions.delete');

Route::get('/widget/campaigns/{campaign}/donation-result/{status}', [SpaLayoutController::class, 'show'])
    ->name('widget.campaigns.donation-result');

Route::get('/widget/{any}', [SpaLayoutController::class, 'show'])->where('any', '[\/\w\.-]*')
    ->name('widget.spa-layout.show')
    ->middleware([]);
