<?php

Route::get('/', 'FrontendController@index')->name('home');
Route::get('campaign/{campaignId}', 'CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/donate', 'CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
Route::get('campaign/{campaignId}/recurrent/create-donator', 'CampaignController@createDonator')->name('campaign.recurrent')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/recurrent/donate', 'CampaignController@donateRecurrent')->name('campaign.recurrent.donate')->where('campaignId', '[0-9]+');
