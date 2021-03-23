<?php
/**
 * URIs prefixed by /{subdir}/dashboard/api.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapDashboardRoutes()
 * Applied middleware groups: api, auth
 */

use Diglabby\Doika\Http\Controllers\Dashboard\AdminController;
use Diglabby\Doika\Http\Controllers\Dashboard\CampaignController;
use Diglabby\Doika\Http\Controllers\Dashboard\DonatorController;
use Diglabby\Doika\Http\Controllers\Dashboard\ImageUploadController;
use Diglabby\Doika\Http\Controllers\Dashboard\NotificationsController;
use Diglabby\Doika\Http\Controllers\Dashboard\SettingsController;
use Diglabby\Doika\Http\Controllers\Dashboard\SubscriptionController;
use Diglabby\Doika\Http\Controllers\Dashboard\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/campaigns', [CampaignController::class, 'index'])->name('dashboard.campaigns.index');
Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])->name('dashboard.campaigns.show');
Route::post('/campaigns', [CampaignController::class, 'store'])->name('dashboard.campaigns.store');
Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('dashboard.campaigns.update');
Route::delete('/campaigns/{campaign}', [CampaignController::class, 'delete'])->name('dashboard.campaigns.delete');

Route::get('/transactions', [TransactionController::class, 'index'])->name('dashboard.transactions.index');
Route::get('/transactions/{transaction}', [TransactionController::class, 'show'])->name('dashboard.transactions.show');

//Routes for notifications. Needs only index and update methods.
Route::get('/notifications', [NotificationsController::class, 'index'])->name('dashboard.notifications.index');
Route::put('/notifications/{notification}', [NotificationsController::class, 'update'])->name('dashboard.notifications.update');

Route::get('/donators', [DonatorController::class, 'index'])->name('dashboard.donators.index');
Route::get('/donators/{donator}', [DonatorController::class, 'show'])->name('dashboard.donators.show');

Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('dashboard.subscriptions.index');
Route::get('/subscriptions/{subscription}', [SubscriptionController::class, 'show'])->name('dashboard.subscriptions.show');
Route::delete('/subscriptions/{subscription}', [SubscriptionController::class, 'delete'])->name('dashboard.subscriptions.delete');

Route::get('/admins', [AdminController::class, 'index'])->name('dashboard.admins.index');
Route::get('/admins/{admin}', [AdminController::class, 'show'])->name('dashboard.admins.show');
Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('dashboard.admins.update');
Route::delete('/admins/{admin}', [AdminController::class, 'delete'])->name('dashboard.admins.delete');

Route::get('/settings', [SettingsController::class, 'index'])->name('dashboard.settings.index');
Route::match(['POST', 'PUT'], '/settings', [SettingsController::class, 'store'])->name('dashboard.settings.store');

Route::post('/images/upload', [ImageUploadController::class, 'store'])->name('dashboard.images.store');
