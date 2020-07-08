<?php
/**
 * URIs prefixed by /doika/widget/api
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: api
 */

Route::get('/campaigns/{campaign}', 'Widget\CampaignController@show')->name('widget.campaigns.show');
Route::post('/campaigns/{campaign}/subscription-intends', 'Widget\CampaignSubscriptionIntendController@store')->name('widget.campaigns.subscription-intends.store');
Route::post('/campaigns/{campaign}/payment-intends', 'Widget\CampaignPaymentIntendController@store')->name('widget.campaigns.payment-intends.store');

Route::get('/help', 'Widget\HelpController@show')->name('widget.help.show');

Route::get('/feedback', 'Widget\FeedbackController@show')->name('widget.feedbacks.show');
Route::post('/feedback', 'Widget\FeedbackController@store')->name('widget.feedbacks.store');
Route::post('/bepaid-check-payment-status', 'Widget\BePaidCheckPaymentStatusController@checkPaymentStatus')->name('widget.bepaid.check-payment-status');
