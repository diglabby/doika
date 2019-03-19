<?php

Auth::routes();
//
//Route::group(
//    ['namespace' => 'Auth'],
//    function () {
//        if (config('account.can_register')) {
//            // Registration Routes...
//            Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
//            Route::post('register', 'RegisterController@register');
//        }
//
//        // Authentication Routes...
//        Route::get('login', 'LoginController@showLoginForm')->name('login');
//        Route::post('login', 'LoginController@login');
//        Route::get('logout', 'LoginController@logout')->name('logout');
//
//        Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('social.login');
//        Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('social.callback');
//
//        // Password Reset Routes...
//        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
//        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
//        Route::post('password/reset', 'ResetPasswordController@reset');
//
//        // Admin specific login forms
//        Route::get(config('app.admin_path').'/login', 'LoginController@showAdminLoginForm')->name('admin.login');
//        Route::get(config('app.admin_path').'/logout', 'LoginController@adminLogout')->name('admin.logout');
//        Route::get(config('app.admin_path').'/password/reset', 'ForgotPasswordController@showAdminLinkRequestForm')->name('admin.password.request');
//    }
//);
