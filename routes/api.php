<?php

use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;

Route::post('doika/webhooks/bepaid/donated/{campaignId}', 'Webhooks\PaymentGateways\BePaidWebhookHandler@donated')
    ->name('webhooks.bepaid.donated')
    ->middleware([VerifyBePaidSignature::class]);
