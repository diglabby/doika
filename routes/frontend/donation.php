<?php

use App\Http\Controllers\Widget\User\DonationController;

Route::get(Config::get('constants.options.path') + '/donation-{id}', [DonationController::class, 'donation'])->where('id', '[0-9]+');
