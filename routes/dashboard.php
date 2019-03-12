<?php
// Prefixed by /doika/dashboard

Route::get('/campaigns', 'Dashboard\CampaignController@index')->name('dashboad.campaigns.index');
Route::get('/campaigns/{id}', 'Dashboard\CampaignController@show')->name('dashboad.campaigns.index');
Route::post('/campaigns', 'Dashboard\CampaignController@store')->name('dashboad.campaigns.delete');
Route::put('/campaigns/{id}', 'Dashboard\CampaignController@update')->name('dashboad.campaigns.update');
Route::delete('/campaigns/{id}', 'Dashboard\CampaignController@delete')->name('dashboad.campaigns.delete');
Route::get('/campaigns/search', 'Dashboard\CampaignController@search')->name('dashboad.campaigns.search');

Route::get('/transactions', 'Dashboard\TransactionController@index')->name('dashboad.transactions.index');
Route::get('/transactions/{id}', 'Dashboard\TransactionController@show')->name('dashboad.transactions.show');
Route::get('/transactions/search', 'Dashboard\TransactionController@search')->name('dashboad.transactions.search');

Route::get('/donators', 'Dashboard\DonatorController@index')->name('dashboad.donators.index');
Route::get('/donators/{id}', 'Dashboard\DonatorController@show')->name('dashboad.donators.show');
Route::delete('/donators/{id}', 'Dashboard\DonatorController@delete')->name('dashboad.donators.delete');

Route::get('/{vue_capture?}', 'Dashboard\DashboardController@index')
    ->where('vue_capture', '[\/\w\.-]*')
    ->name('dashboard.home');
