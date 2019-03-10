<?php
// Prefixed by /doika/dashboard

Route::get('/campaigns', 'Dashboard\CampaignController@index')->name('dashboad.campaigns.index');
Route::get('/campaigns/{id}', 'Dashboard\CampaignController@show')->name('dashboad.campaigns.index');
Route::delete('/campaigns/{id}', 'Dashboard\CampaignController@delete')->name('dashboad.campaigns.delete');

Route::get('/transactions', 'Dashboard\TransactionController@index')->name('dashboad.transactions.index');
Route::get('/transactions/{id}', 'Dashboard\TransactionController@show')->name('dashboad.transactions.show');

Route::get('/donators', 'Dashboard\DonatorController@index')->name('dashboad.donators.index');
Route::get('/donators/{id}', 'Dashboard\DonatorController@show')->name('dashboad.donators.show');
Route::delete('/donators/{id}', 'Dashboard\DonatorController@delete')->name('dashboad.donators.delete');
