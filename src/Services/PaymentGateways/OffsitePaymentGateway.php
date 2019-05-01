<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Money\Money;

interface OffsitePaymentGateway extends PaymentGateway
{
    /**
     * Create a token from payment data so we can use it on next steps instead passing all required params
     * @param Money $money
     * @param Donator $donator
     * @param Campaign $campaign
     * @return string
     */
    public function tokenizePayment(Money $money, Donator $donator, Campaign $campaign): string;
}
