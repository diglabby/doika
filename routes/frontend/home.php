<?php

use App\Http\Controllers\Widget\HomeController;

Route::get(Config::get('constants.options.path') + '/home', [HomeController::class, 'index'])->name('home');
