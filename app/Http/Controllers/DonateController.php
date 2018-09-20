<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Donate;
use App\PaymentImplementation;

class DonateController extends Controller
{
    public function donate(Request $request, $id){
        
        echo Donate::getPaymentPage($request, $id);
        
        
    }
    public function recordPayment(Request $request,$id){
        
        PaymentImplementation::createPayment($request, $id);
        
    }
}
