<?php

use App\Http\Controllers\Backend\AdminController;

Route::get(Config::get('constants.options.path') + 'admin', [AdminController::class, 'index'])->name('admin');
