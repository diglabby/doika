<?php
/**
 * URIs prefixed by /doika/widget/api
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: api
 */

Route::get('/campaigns/{campaign}', 'Widget\CampaignController@show')->name('widget.campaigns.show')->where('campaignId', '[0-9]+');
Route::post('/campaigns/{campaign}/subscription-intends', 'Widget\CampaignSubscriptionIntendController@store')->name('widget.campaigns.subscription-intends.store')->where('campaignId', '[0-9]+')->middleware(['api']);
Route::post('/campaigns/{campaign}/payment-intends', 'Widget\CampaignPaymentIntendController@store')->name('widget.campaigns.payment-intends.store')->where('campaignId', '[0-9]+')->middleware(['api']);
Route::get('/campaigns/{campaign}/donation-result', 'Widget\CampaignDonationResultController@show')->name('widget.campaigns.donation-result');

Route::get('/help', 'Widget\HelpController@show')->name('widget.help.show');

Route::get('/feedback', 'Widget\FeedbackController@show')->name('widget.feedbacks.show');
Route::post('/feedback', 'Widget\FeedbackController@store')->name('widget.feedbacks.store');
