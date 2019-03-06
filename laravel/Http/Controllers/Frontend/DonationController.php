<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Donation;
use App\Model\Payment;

class DonationController extends Controller
{
    public function Donation(Request $request, $id){
        
        echo Donation::getPaymentPage($request, $id);
        
        
    }
    public function recordPayment(Request $request,$id){
        
        PaymentImplementation::createPayment($request, $id);
        
    }
}
