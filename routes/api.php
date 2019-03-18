<?php

Route::post('doika/webhooks/bepaid/donated/{campaignId}', 'Webhooks\PaymentGateways\BePaidWebhookHandler@donated')->name('webhooks.bepaid.donated');
