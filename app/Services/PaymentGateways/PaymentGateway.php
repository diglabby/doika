<?php

declare(strict_types=1);

namespace Diglabby\Doika\Services\PaymentGateways;

interface PaymentGateway
{
    /**
     * Return Payment Gateway ID, unique for every gateway.
     *
     * @return string
     */
    public function getGatewayId(): string;
}
