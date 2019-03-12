<?php

Route::get('/', 'Widget\WidgetController@index')->name('home');
Route::get('campaign/{campaignId}', 'Widget\CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/donate', 'Widget\CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
Route::get('campaign/{campaignId}/recurrent/create-donator', 'Widget\CampaignController@createDonator')->name('campaign.recurrent')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/recurrent/donate', 'Widget\CampaignController@donateRecurrent')->name('campaign.recurrent.donate')->where('campaignId', '[0-9]+');

Route::get('about', function () {})->name('about');
Route::get('contact', function () {})->name('contact');
Route::get('home', function () {})->name('home');
Route::get('legal-mentions', function () {})->name('legal-mentions');
