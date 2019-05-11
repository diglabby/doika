<?php
/**
 * URIs prefixed by /doika/widget
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: web
 */

Route::get('/{any}', 'Widget\SpaLayoutController@show')->where('any', '[\/\w\.-]*')
    ->name('widget.spa-layout.show')
    ->middleware([]);
