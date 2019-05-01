<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Prefixed by /doika/widget
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/campaigns/{campaign}', 'Widget\CampaignController@show')->name('widget.campaign.show')->where('campaignId', '[0-9]+');
Route::get('/campaigns/{campaign}/donation-result', 'Widget\CampaignDonationResultController@show')->name('widget.campaign.donation-result');

Route::get('/help', 'Widget\HelpController@show')->name('widget.help.show');

Route::get('/feedback', 'Widget\FeedbackController@show')->name('widget.feedbacks.show');
Route::post('/feedback', 'Widget\FeedbackController@store')->name('widget.feedbacks.store');
