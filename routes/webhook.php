<?php
/**
 * URIs prefixed by /doika/.
 *
 * @see \Diglabby\Doika\Providers\RouteServiceProvider::mapWebhookRoutes()
 * Applied middleware groups: api
 */

use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;

Route::post('/bepaid/donated/{campaignId}', 'Webhooks\PaymentGateways\BePaidPaymentWebhookHandler@donated')
    ->name('webhooks.bepaid.donated')
    ->middleware([VerifyBePaidSignature::class]);

Route::post('/bepaid/subscriptions', 'Webhooks\PaymentGateways\BePaidSubscriptionWebhookHandler')
    ->name('webhooks.bepaid.subscriptions')
    ->middleware([VerifyBePaidSignature::class]);
