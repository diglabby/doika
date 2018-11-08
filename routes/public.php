<?php
//Route::get('/{vue_capture?}', 'FrontendController@index')
//    ->where('vue_capture', '[\/\w\.-]*')
//    ->name('home');
Route::get('/', 'FrontendController@index')->name('home');


//if (config('campaign.enabled')) {
    //Route::get('campaign', 'CampaignController@index')->name('campaign.index');

    //Route::get('campaign/tags/{tag}', 'CampaignController@tag')->name('campaign.tag');

    Route::get('campaign/{campaignId}', 'CampaignController@show')->name('campaign.show')->where('campaignId', '[0-9]+');

    Route::get('campaign/{campaignId}/donate', 'CampaignController@donate')->name('campaign.donate')->where('campaignId', '[0-9]+');
    Route::get('campaign/get', 'CampaignController@get')->name('campaign.get');
    //Route::get(
    //    LaravelLocalization::transRoute('routes.redactors'),
    //    'CampaignController@owner'
    //)->name('campaign.owner');
//}
