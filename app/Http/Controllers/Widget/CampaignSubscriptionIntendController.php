<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Money\Money;

final class CampaignSubscriptionIntendController extends Controller
{
    public function store(Campaign $campaign, Request $request, BePaidPaymentGateway $gateway): Responsable
    {
        $this->validate($request, [
            'amount' => ['required', 'integer', 'min:100'], // in cents!
            'currency_code' => ['string', 'size:3'],
            'payment_interval' => ['required'], // P1M (means 1 month)
            'email' => ['required', 'email'],
        ]);

        if ($campaign->isFinished()) {
            return response()->json(
                ['errors' => ['campaign' => 'The campaign is finished']],
                Response::HTTP_GONE);
        }

        /** @var Donator $donator */
        $donator = Donator::query()->updateOrCreate([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
        ]);

        $money = new Money($request->get('amount'), $request->get('currency_code'));

        $redirectUrl = $gateway->tokenizeSubscriptionIntend($donator, $campaign, $money, $request->get('payment_interval'));

        return $redirectUrl;
    }
}
