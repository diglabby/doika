<?php

use App\Http\Controllers\LanguageController;

Route::get('lang/{lang}', [LanguageController::class, 'swap']);


Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});


Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    include_route_files(__DIR__.'/backend/');
});
