<?php

Route::get('/', 'Widget\WidgetController@index')->name('home');
Route::get('campaign/{campaignId}', 'Widget\CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/donate', 'Widget\CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
Route::get('campaign/{campaignId}/recurrent/create-donator', 'Widget\CampaignController@createDonator')->name('campaign.recurrent')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/recurrent/donate', 'Widget\CampaignController@donateRecurrent')->name('campaign.recurrent.donate')->where('campaignId', '[0-9]+');
