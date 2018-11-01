<?php

Route::get('/', 'FrontendController@index')->name('home');

Route::get(
    LaravelLocalization::transRoute('routes.about'),
    'PagesController@about'
)->name('about');

Route::match(['GET', 'POST'],
    LaravelLocalization::transRoute('routes.contact'),
    'PagesController@contact'
)->name('contact');

Route::get(
    LaravelLocalization::transRoute('routes.contact-sent'),
    'PagesController@contactSent'
)->name('contact-sent');

Route::get(
    LaravelLocalization::transRoute('routes.legal-mentions'),
    'PagesController@legalMentions'
)->name('legal-mentions');

//if (config('campaign.enabled')) {
    Route::get('campaign', 'CampaignController@index')->name('campaign.index');

    Route::get('campaign/tags/{tag}', 'CampaignController@tag')->name('campaign.tag');
    Route::get('campaign/{campaignId}', 'CampaignController@show')->name('campaign.show');
    Route::get('campaign/{campaignId}/donate', 'CampaignController@donate')->name('campaign.donate');
    Route::get('campaign/get', 'CampaignController@get')->name('campaign.get');
    Route::get(
        LaravelLocalization::transRoute('routes.redactors'),
        'CampaignController@owner'
    )->name('campaign.owner');
//}
