<?php

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('doika/dashboard/campaigns');
})->name('dashboard.home')->middleware(['auth']);

Route::get('/{any}', 'Dashboard\SpaLayoutController@show')->where('any', '[\/\w\.-]*')
    ->name('dashboard.spa-layout.show')
    ->middleware(['auth']);
