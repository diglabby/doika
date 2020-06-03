<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use Illuminate\Http\Request;
use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;

final class CheckPaymentStatusController extends Controller
{
    public function checkPaymentStatus(BePaidPaymentGateway $gateway, Request $request)
    {
        if ($request->has('token')) {
            $token = $request->token;
        } else {
            throw new \InvalidArgumentException('Request must have token parameter!');
        }
        $arrResponse = $gateway->checkPaymentStatus($token);

        echo $arrResponse['json_response'];
        echo '<br>// Status line: <br>';
        echo $arrResponse['status'];
    }
}
