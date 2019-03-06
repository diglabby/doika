<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Doika_confuguration;
use App\Model\ConfigurationPageAdmin;
use App\Model\Payment;

class PaymentImplementation extends Model {
  static public function createPayment($request, $id) {

    $message = file_get_contents('php://input');
    $message = json_decode($message);

    if($message->transaction->status == "successful") {
      $payment = new Payment;
      $payment->campaign_id = $id;
      $payment->amount = $message->transaction->amount * 0.01;
      $payment->token_payment = $message->transaction->credit_card->token;
      $payment->save();
    }
  }
}