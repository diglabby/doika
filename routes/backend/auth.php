<?php

use App\Http\Controllers\Backend\Auth\Role\RoleController;
use App\Http\Controllers\Backend\Auth\User\UserController;
use App\Http\Controllers\Backend\Auth\User\UserAccessController;
use App\Http\Controllers\Backend\Auth\User\UserStatusController;
use App\Http\Controllers\Backend\Auth\User\UserSessionController;
use App\Http\Controllers\Backend\Auth\User\UserPasswordController;
use App\Http\Controllers\Backend\Auth\User\UserConfirmationController;


Route::group([
    'prefix'     => 'auth',
    'as'         => 'auth.',
    'namespace'  => 'Auth',
    'middleware' => 'role:'.config('access.users.admin_role'),
], function () {

    $path = Config::get('constants.options.path');


    Route::get($path + 'create', 'DevController@getCreatePage');
    Route::post($path + 'create', 'CampaignAdminController@create');

    Route::get($path + 'show-list', 'CampaignAdminController@showList');
    Route::get($path + 'show-list-{id}','CampaignAdminController@showListConditions')->where('id', '[0-9]+');
    Route::get($path + 'get-out', 'CampaignAdminController@getOut');


    Route::group(['namespace' => 'Campaign'], function () {
        Route::get($path + 'campaign', [CampaignController::class, 'index'])->name('campaign.index');
        Route::get($path + 'campaign/create', [CampaignController::class, 'create'])->name('campaign.create');
        Route::post($path + 'campaign', [CampaignController::class, 'store'])->name('campaign.store');

        Route::group(['prefix' => 'campaign/{configuration}'], function () {
            Route::get($path + 'edit', [CampaignController::class, 'edit'])->name('campaign.edit');
            Route::patch($path + '/', [CampaignController::class, 'update'])->name('campaign.update');
            Route::delete($path + '/', [CampaignController::class, 'destroy'])->name('campaign.destroy');
        });
    });

    Route::group(['namespace' => 'Configuration'], function () {
        Route::get($path + 'configuration', [ConfigurationController::class, 'index'])->name('configuration.index');
        Route::get($path + 'configuration/create', [ConfigurationController::class, 'create'])->name('configuration.create');
        Route::post($path + 'configuration', [ConfigurationController::class, 'store'])->name('configuration.store');

        Route::group(['prefix' => 'configuration/{configuration}'], function () {
            Route::get($path + 'edit', [ConfigurationController::class, 'edit'])->name('configuration.edit');
            Route::patch($path + '/', [ConfigurationController::class, 'update'])->name('configuration.update');
            Route::delete($path + '/', [ConfigurationController::class, 'destroy'])->name('configuration.destroy');
        });
    });

    Route::group(['namespace' => 'User'], function () {


        Route::get($path + 'user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
        Route::get($path + 'user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');


        Route::get($path + 'user', [UserController::class, 'index'])->name('user.index');
        Route::get($path + 'user/create', [UserController::class, 'create'])->name('user.create');
        Route::post($path + 'user', [UserController::class, 'store'])->name('user.store');


        Route::group(['prefix' => $path + 'user/{user}'], function () {
            // User
            Route::get($path + '/', [UserController::class, 'show'])->name('user.show');
            Route::get($path + 'edit', [UserController::class, 'edit'])->name('user.edit');
            Route::patch($path + '/', [UserController::class, 'update'])->name('user.update');
            Route::delete($path + '/', [UserController::class, 'destroy'])->name('user.destroy');

            // Account
            Route::get($path + 'account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');

            // Status
            Route::get($path + 'mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);

            // Confirmation
            Route::get($path + 'confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
            Route::get($path + 'unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');

            // Password
            Route::get($path + 'password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
            Route::patch($path + 'password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');

            // Access
            Route::get($path + 'login-as', [UserAccessController::class, 'loginAs'])->name('user.login-as');

            // Session
            Route::get($path + 'clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');

            // Deleted
            Route::get($path + 'delete', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
            Route::get($path + 'restore', [UserStatusController::class, 'restore'])->name('user.restore');
        });
    });

    Route::group(['namespace' => 'Role'], function () {
        Route::get($path + 'role', [RoleController::class, 'index'])->name('role.index');
        Route::get($path + 'role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post($path + 'role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role/{role}'], function () {
            Route::get($path + 'edit', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch($path + '/', [RoleController::class, 'update'])->name('role.update');
            Route::delete($path + '/', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });
});
