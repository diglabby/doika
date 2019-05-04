<?php
/**
 * Prefixed by /doika/dashboard
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapDashboardRoutes
 */

Route::get('/campaigns/index', 'Dashboard\CampaignController@index')->name('dashboard.campaigns.index');
Route::get('/campaigns/{campaign}', 'Dashboard\CampaignController@show')->name('dashboard.campaigns.show');
Route::post('/campaigns', 'Dashboard\CampaignController@store')->name('dashboard.campaigns.store');
Route::put('/campaigns/{campaign}', 'Dashboard\CampaignController@update')->name('dashboard.campaigns.update');
Route::delete('/campaigns/{campaign}', 'Dashboard\CampaignController@delete')->name('dashboard.campaigns.delete');

Route::get('/transactions', 'Dashboard\TransactionController@index')->name('dashboard.transactions.index');
Route::get('/transactions/{id}', 'Dashboard\TransactionController@show')->name('dashboard.transactions.show');
Route::post('/transactions', 'Dashboard\TransactionController@store')->name('dashboard.transactions.store');

Route::get('/donators', 'Dashboard\DonatorController@index')->name('dashboard.donators.index');
Route::get('/donators/{id}', 'Dashboard\DonatorController@show')->name('dashboard.donators.show');
Route::post('/donators', 'Dashboard\DonatorController@store')->name('dashboard.donators.store');
Route::put('/donators/{id}', 'Dashboard\DonatorController@update')->name('dashboard.donators.update');
Route::delete('/donators/{id}', 'Dashboard\DonatorController@delete')->name('dashboard.donators.delete');

Route::get('/settings', 'Dashboard\SettingsController@index')->name('dashboard.settings.index');
Route::match(['POST', 'PUT'], '/settings', 'Dashboard\SettingsController@store')->name('dashboard.settings.store');

Route::post('/images/upload', 'Dashboard\ImageUploadController@store')->name('dashboard.images.store');

Route::get('/{vue_capture?}', 'Dashboard\DashboardController@index')
    ->where('vue_capture', '[\/\w\.-]*')
    ->name('dashboard.home');
