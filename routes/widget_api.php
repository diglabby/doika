<?php
/**
 * URIs prefixed by /{subdir}/widget/api.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWidgetRoutes()
 * Applied middleware groups: api
 */

use Diglabby\Doika\Http\Controllers\Widget\BePaidCheckPaymentStatusController;
use Diglabby\Doika\Http\Controllers\Widget\CampaignController;
use Diglabby\Doika\Http\Controllers\Widget\CampaignPaymentIntendController;
use Diglabby\Doika\Http\Controllers\Widget\CampaignSubscriptionIntendController;
use Diglabby\Doika\Http\Controllers\Widget\FeedbackController;
use Diglabby\Doika\Http\Controllers\Widget\HelpController;
use Illuminate\Support\Facades\Route;

Route::get('/campaigns/latest', [CampaignController::class, 'showLatest'])->name('widget.campaigns.showLatest');
Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])->name('widget.campaigns.show');
Route::post('/campaigns/{campaign}/subscription-intends', [CampaignSubscriptionIntendController::class, 'store'])->name('widget.campaigns.subscription-intends.store');
Route::post('/campaigns/{campaign}/payment-intends', [CampaignPaymentIntendController::class, 'store'])->name('widget.campaigns.payment-intends.store');

Route::get('/help', [HelpController::class, 'show'])->name('widget.help.show');

Route::get('/feedback', [FeedbackController::class, 'show'])->name('widget.feedbacks.show');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('widget.feedbacks.store');
Route::post('/bepaid-check-payment-status', [BePaidCheckPaymentStatusController::class, 'checkPaymentStatus'])->name('widget.bepaid.check-payment-status');
