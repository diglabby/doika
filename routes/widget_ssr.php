<?php
/**
 * URIs prefixed by /doika
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: web
 */

Route::get('/subscriptions/cancel', 'Widget\SubscriptionController@delete')
    ->name('widget.subscriptions.delete');

Route::get('/widget/{any}', 'Widget\SpaLayoutController@show')->where('any', '[\/\w\.-]*')
    ->name('widget.spa-layout.show')
    ->middleware([]);
