<?php
//Route::get('/{vue_capture?}', 'FrontendController@index')
//    ->where('vue_capture', '[\/\w\.-]*')
//    ->name('home');
	Route::get('/', 'FrontendController@index')->name('home');


//if (config('campaign.enabled')) {
    //Route::get('campaign', 'CampaignController@index')->name('campaign.index');

    //Route::get('doika/campaign/tags/{tag}', 'CampaignController@tag')->name('campaign.tag');

    Route::get('doika/campaign/{campaignId}', 'CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');

    Route::get('doika/campaign/{campaignId}/donate', 'CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
    Route::get('doika/campaign/get', 'CampaignController@get')->name('campaign.get');
	
	Route::get('doika/campaign/{campaignId}/recurrent', 'CampaignController@donate')->name('campaign.recurrent')->where('campaignId', '[0-9]+');
    Route::get('doika/campaign/{campaignId}/recurrent/status', 'CampaignController@donate')->name('campaign.recurrent.status')->where('campaignId', '[0-9]+');
	Route::get('doika/campaign/{campaignId}/recurrent/donate', 'CampaignController@donate')->name('campaign.recurrent.donate')->where('campaignId', '[0-9]+');
	Route::get('doika/campaign/{campaignId}/donate/status', 'CampaignController@donate')->name('campaign.donate.status')->where('campaignId', '[0-9]+');
	
    //Route::get(
    //    LaravelLocalization::transRoute('routes.redactors'),
    //    'CampaignController@owner'
    //)->name('campaign.owner');
//}
