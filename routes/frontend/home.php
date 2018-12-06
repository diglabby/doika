<?php

use App\Http\Controllers\Frontend\HomeController;

Route::get(Config::get('constants.options.path') + '/home', [HomeController::class, 'index'])->name('home');
