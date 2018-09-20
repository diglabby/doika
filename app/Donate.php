<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;
use App\Doika_configuration;

class Donate extends Model
{
    //
    static public function getPaymentPage($request,$id){




        $idMarket = Doika_configuration::where('configuration_name','id_market')
                ->first()->configuration_value;
        $keyMarket = Doika_configuration::where('configuration_name','key_market')
                ->first()->configuration_value;
        if(Doika_configuration::where('configuration_name','is_test')
                ->first()->configuration_value == 1){
            $is_test = true;
        }else{
            $is_test = false;
        }

        $url = isset($request->url) ? urldecode($request->url) : ("https://" . $_SERVER['HTTP_HOST'] . '/');
        $url .= (strpos($url, "?") > 0) ? "&" : "?";

        $donate = $request->donate*100;
        $GetTokenParams = [
          "checkout" => [
            "test" => $is_test, //true,
            "transaction_type" => "payment",
            "version" => 2.1,
            "attempts" => 3,
            "settings" => [
              "success_url" => $url . "message=1",
              "decline_url" => $url . "message=2",
              "fail_url" => $url . "message=3",
              "notification_url" => "https://".$_SERVER['HTTP_HOST']."/doika/payment-record-db-".$id,
              "language"=> "ru"
            ],
            "order" =>[
              "currency"=> "BYN",
              "amount"=> $donate,
              "description"=> "Order description"
            ],
            "customer"=> [
              "address"=> "Baker street 221b",
              "country"=> "GB",
              "city"=> "London",
              "email"=> "jake@example.com"
            ],
          ]
        ];

        $client = new Client([
          'base_uri' => "https://checkout.bepaid.by"
        ]);

        $response = $client->request('POST', '/ctp/api/checkouts', [
          'auth'    => [$idMarket, $keyMarket],
          'headers' => ['Accept' => 'application/json'],
          'json'    => $GetTokenParams,
          'verify' => false
        ]);
        return $response->getBody();
    }
}
