<?php
// Prefixed by /doika/dashboard

Route::get('/campaigns', 'Dashboard\CampaignController@index')->name('dashboad.campaigns.index');
Route::get('/campaigns/{id}', 'Dashboard\CampaignController@show')->name('dashboad.campaigns.index');
Route::post('/campaigns', 'Dashboard\CampaignController@store')->name('dashboad.campaigns.store');
Route::put('/campaigns/{id}', 'Dashboard\CampaignController@update')->name('dashboad.campaigns.update');
Route::delete('/campaigns/{id}', 'Dashboard\CampaignController@delete')->name('dashboad.campaigns.delete');

Route::get('/transactions', 'Dashboard\TransactionController@index')->name('dashboad.transactions.index');
Route::get('/transactions/{id}', 'Dashboard\TransactionController@show')->name('dashboad.transactions.show');
Route::post('/transactions', 'Dashboard\TransactionController@store')->name('dashboad.transactions.store');

Route::get('/donators', 'Dashboard\DonatorController@index')->name('dashboad.donators.index');
Route::get('/donators/{id}', 'Dashboard\DonatorController@show')->name('dashboad.donators.show');
Route::post('/donators', 'Dashboard\DonatorController@store')->name('dashboad.donators.store');
Route::put('/donators/{id}', 'Dashboard\DonatorController@update')->name('dashboad.donators.update');
Route::delete('/donators/{id}', 'Dashboard\DonatorController@delete')->name('dashboad.donators.delete');

Route::get('/{vue_capture?}', 'Dashboard\DashboardController@index')
    ->where('vue_capture', '[\/\w\.-]*')
    ->name('dashboard.home');
