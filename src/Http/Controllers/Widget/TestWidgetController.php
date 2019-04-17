<?php


namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Diglabby\Doika\Services\PaymentGateways\BePaidRecurrentPaymentGateway;
use Illuminate\Http\Request;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Config;
use Money\Money;


class TestWidgetController extends Controller
{
    public function showForm($campaignId)
    {
        $data['payment_interval'] = Config::get('bepaid.payment_interval','30');
        $data['campaign'] = $campaignId;

        return view('widget.test-widget', $data);
    }

    public function sendForm(Request $request)
    {
        $paymentInterval = $request->payment_interval;
        $money = Money::BYN($request->amount);
        $campaign = Campaign::find($request->campaign_id);

        $donator = new Donator();
        $apiContext = new BePaidApiContext([
            'marketId' => Config::get('bepaid.marketId'),
            'marketKey' => Config::get('bepaid.marketKey'),
            'live' => Config::get('bepaid.live')
        ]);
        $httpClient = new HttpClient();
        $recurrentPaumentsGateway = new BePaidRecurrentPaymentGateway($apiContext, $httpClient);
        $recurrentPaumentsGateway->createSubscription($money, $campaign, $donator, $paymentInterval);


    }

}
