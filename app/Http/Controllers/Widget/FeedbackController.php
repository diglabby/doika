<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;

final class FeedbackController extends Controller
{
    public function show(): Renderable
    {
        return view('widget.pages.feedbacks.show');
    }

    public function checkPaymentStatus(BePaidPaymentGateway $gateway, Request $request)
    {
        $gateway->checkPaymentStatus($request);
    }

    public function store(Request $request)
    {
        // @todo what is supposed to return here?
        return $request->all();
    }
}
