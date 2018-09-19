<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

$path = Config::get('doika.constants.path');

/*
|--------------------------------------------------------------------------
| Route to client side of the module
|--------------------------------------------------------------------------
||
*/
Route::get($path.'/campaign-{id}', 'CampaignClientController@getCampaignClient')->where('id', '[0-9]+');
Route::get($path.'/donate-{id}', 'CampaignClientController@getCampaignClient')->where('id', '[0-9]+');
Route::post($path.'/register-payment-{id}', 'DonateController@registerPayment')->where('id', '[0-9]+');
Route::get($path.'/register-payment-{id}', 'DonateController@registerPayment')->where('id', '[0-9]+');
Route::get($path.'/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {
	
	// routes Campaigns
	Route::post($path.'/create', 'CampaignBackendController@create');
	Route::get($path.'/show-campaign-{id}', 'CampaignBackendController@show')->where('id', '[0-9]+');
	Route::post($path.'/update-campaign-{id}', 'CampaignBackendController@update')->where('id', '[0-9]+');
	Route::get($path.'/delete-campaign-{id}', 'CampaignBackendController@delete')->where('id', '[0-9]+');
	Route::get($path.'/show-list', 'CampaignBackendController@showList');
	Route::get($path.'/show-list-{id}','CampaignBackendController@showListConditions')->where('id', '[0-9]+');
	Route::get($path.'/quit', 'CampaignBackendController@getOut');

	// routes Configurations
	Route::get($path.'/show-configurations', 'ConfigurationBackendController@showConfigurations');
	Route::post($path.'/save-configurations', 'ConfigurationBackendController@saveConfigurations');
	Route::post($path.'/save-login', 'ConfigurationBackendController@changePassword');

	Route::get($path, 'CampaignBackendController@showList');
});

Auth::routes();

