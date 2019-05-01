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

Route::get('/campaigns/{campaign}/show', 'Widget\CampaignController@show')->where('campaign', '[0-9]+')->name('widget.campaigns.show');
Route::get('/campaigns/{campaign}/donation-result', 'Widget\CampaignDonationResultController@show')->where('campaign', '[0-9]+')->name('widget.campaigns.donation-result');

Route::get('/help', 'Widget\HelpController@show')->name('widget.help.show');

Route::get('/feedback', 'Widget\FeedbackController@show')->name('widget.feedbacks.show');
Route::post('/feedback', 'Widget\FeedbackController@store')->name('widget.feedbacks.store');

Route::get('/{vue_capture?}', 'Widget\WidgetController@index')
    ->where('vue_capture', '[\/\w\.-]*')
    ->name('widget.home');
