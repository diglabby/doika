<?php

Route::get('/{any}', 'Widget\SpaLayoutController@show')->where('any', '[\/\w\.-]*')
    ->name('widget.spa-layout.show')
    ->middleware([]);
