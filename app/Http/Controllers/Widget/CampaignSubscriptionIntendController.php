<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Carbon\CarbonInterval;
use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\SubscriptionIntend;
use Diglabby\Doika\Rules\IsoTimeDuration;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Money\Currency;
use Money\Money;

final class CampaignSubscriptionIntendController extends Controller
{
    public function store(Campaign $campaign, Request $request, BePaidPaymentGateway $gateway)
    {
        $this->validate($request, [
            'amount' => ['required', 'integer', 'min:100'], // in cents!
            'currency_code' => ['string', 'size:3'],
            'payment_interval' => ['required', new IsoTimeDuration()], // P1M (means 1 month)
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string', 'max:20'],
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

        $donator->update(['phone' => $request->get('phone')]);

        $money = new Money($request->get('amount'), new Currency($request->get('currency_code')));
        $interval = new CarbonInterval($request->get('payment_interval'));
        $subscriptionIntend = new SubscriptionIntend($money, $donator, $campaign, $interval);

        $redirectUrl = $gateway->tokenizeSubscriptionIntend($subscriptionIntend);

        return $redirectUrl;
    }
}
