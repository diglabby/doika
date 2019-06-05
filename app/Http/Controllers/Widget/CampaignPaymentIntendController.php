<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Http\Request;
use Money\Currency;
use Money\Money;

final class CampaignPaymentIntendController extends Controller
{
    public function store(Campaign $campaign, BePaidPaymentGateway $gateway, Request $request)
    {
        $this->validate($request, [
            'amount' => ['required', 'integer', 'min:100'], // in cents!
            'currency_code' => ['string', 'size:3'],
        ]);

        $money = new Money($request->get('amount'), new Currency($request->get('currency_code')));

        $redirectUrl = $gateway->tokenizePaymentIntend($money, $campaign);

        return $redirectUrl;
    }
}
