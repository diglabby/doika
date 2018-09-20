<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Doika_confuguration;
use App\ConfigurationPageAdmin;
use App\Payment;

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