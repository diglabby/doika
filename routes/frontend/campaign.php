<?php

use App\Http\Controllers\Widget\User\CampaignClientController;

Route::get(Config::get('constants.options.path') + '/campaign-{id}', [CampaignClientController::class, 'getCampaignClient'])->where('id', '[0-9]+');
