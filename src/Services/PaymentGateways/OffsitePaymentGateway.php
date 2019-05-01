<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Money\Money;

interface OffsitePaymentGateway extends PaymentGateway
{
    /**
     * Create a token from payment data and get a redirect URL
     * so we can redirect visitor to a payment page
     * where visitor can input payment data.
     * @param Money $money
     * @param Donator $donator
     * @param Campaign $campaign
     * @return string
     */
    public function tokenizePaymentIntend(Money $money, Donator $donator, Campaign $campaign): string;
}
