<?php

use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;

Route::post('doika/webhooks/bepaid/donated/{campaignId}', 'Webhooks\PaymentGateways\BePaidWebhookHandler@donated')
    ->name('webhooks.bepaid.donated')
    ->middleware([VerifyBePaidSignature::class]);

Route::post('doika/webhooks/bepaid/subscriptions', 'Webhooks\PaymentGateways\BePaidSubscriptionWebhookHandler')
    ->name('webhooks.bepaid.subscriptions')
    ->middleware([VerifyBePaidSignature::class]);
