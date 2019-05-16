<?php
/**
 * URIs prefixed by /doika/dashboard/api
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapDashboardRoutes()
 * Applied middleware groups: api, auth
 */

Route::get('/campaigns', 'Dashboard\CampaignController@index')->name('dashboard.campaigns.index');
Route::get('/campaigns/{campaign}', 'Dashboard\CampaignController@show')->name('dashboard.campaigns.show');
Route::post('/campaigns', 'Dashboard\CampaignController@store')->name('dashboard.campaigns.store');
Route::put('/campaigns/{campaign}', 'Dashboard\CampaignController@update')->name('dashboard.campaigns.update');
Route::delete('/campaigns/{campaign}', 'Dashboard\CampaignController@delete')->name('dashboard.campaigns.delete');

Route::get('/transactions', 'Dashboard\TransactionController@index')->name('dashboard.transactions.index');
Route::get('/transactions/{transaction}', 'Dashboard\TransactionController@show')->name('dashboard.transactions.show');

Route::get('/donators', 'Dashboard\DonatorController@index')->name('dashboard.donators.index');
Route::get('/donators/{donator}', 'Dashboard\DonatorController@show')->name('dashboard.donators.show');

Route::get('/subscriptions', 'Dashboard\SubscriptionController@index')->name('dashboard.subscriptions.index');
Route::get('/subscriptions/{subscription}', 'Dashboard\SubscriptionController@show')->name('dashboard.subscriptions.show');
Route::delete('/subscriptions/{subscription}', 'Dashboard\SubscriptionController@delete')->name('dashboard.subscriptions.delete');

Route::get('/settings', 'Dashboard\SettingsController@index')->name('dashboard.settings.index');
Route::match(['POST', 'PUT'], '/settings', 'Dashboard\SettingsController@store')->name('dashboard.settings.store');

Route::post('/images/upload', 'Dashboard\ImageUploadController@store')->name('dashboard.images.store');
