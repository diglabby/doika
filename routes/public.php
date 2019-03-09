<?php

Route::get('/', 'Frontend\FrontendController@index')->name('home');
Route::get('campaign/{campaignId}', 'Frontend\CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/donate', 'Frontend\CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
Route::get('campaign/{campaignId}/recurrent/create-donator', 'Frontend\CampaignController@createDonator')->name('campaign.recurrent')->where('campaignId', '[0-9]+');
Route::post('campaign/{campaignId}/recurrent/donate', 'Frontend\CampaignController@donateRecurrent')->name('campaign.recurrent.donate')->where('campaignId', '[0-9]+');
