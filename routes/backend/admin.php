<?php

use App\Http\Controllers\Dashboard\AdminController;

Route::get(Config::get('constants.options.path') + 'admin', [AdminController::class, 'index'])->name('admin');
