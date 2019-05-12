<?php

namespace Diglabby\Doika\Services\PaymentGateways;

use Diglabby\Doika\Models\Subscription;

interface SupportsSubscriptionsGateway extends PaymentGateway
{
    public function unsubscribe(Subscription $subscription, string $reason): void;
}
