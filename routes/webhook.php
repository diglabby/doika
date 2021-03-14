<?php
/**
 * URIs prefixed by /doika/.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWebhookRoutes()
 * Applied middleware groups: api
 */

use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidPaymentWebhookHandler;
use Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidSubscriptionWebhookHandler;
use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;
use Illuminate\Support\Facades\Route;

Route::post('/bepaid/donated/{campaignId}', [BePaidPaymentWebhookHandler::class, 'donated'])
    ->name('webhooks.bepaid.donated')
    ->middleware([VerifyBePaidSignature::class]);

Route::post('/bepaid/subscriptions', BePaidSubscriptionWebhookHandler::class)
    ->name('webhooks.bepaid.subscriptions')
    ->middleware([VerifyBePaidSignature::class]);
