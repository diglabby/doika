<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Http\Request;
use Money\Money;
use Money\Currency;

class CampaignPaymentIntendController extends Controller
{
    public function store(Campaign $campaign, BePaidPaymentGateway $gateway, Request $request)
    {
        $this->validate($request, [
            'amount' => ['required', 'integer', 'min:100'], // in cents!
            'currency_code' => ['string', 'size:3'],
            'email' => ['nullable', 'email'],
        ]);

        /** @var Donator $donator */
        $donator = Donator::query()->updateOrCreate([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
        ]);

        $money = new Money($request->get('amount'), new Currency($request->get('currency_code')));

        $redirectUrl = $gateway->tokenizePaymentIntend($money, $donator, $campaign);

        return $redirectUrl;
    }
}
