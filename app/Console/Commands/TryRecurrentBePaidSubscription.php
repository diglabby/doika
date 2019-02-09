<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;


class TryRecurrentBePaidSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurrent_be_paid_subscription:try {id_plan} {id_customer} {id_market} {key_market}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Читаем введенные аргументы
        $idPlan = $this->argument('id_plan');
        $idCustomer = $this->argument('id_customer');
        $idMarket = $this->argument('id_market');
        $keyMarket = $this->argument('key_market');

        $GetSubscriptionParams = [
            "customer" => [
                "id" => $idCustomer
            ],
            "plan" => [
                "id" => $idPlan
            ],
            "return_url" => "https://doika.falanster.by/",
            "settings" => [
                "language" => "ru"
            ]
        ];

        $client = new Client([
            'base_uri' => "https://api.bepaid.by"
        ]);
        $response = $client->request('POST', '/subscriptions', [
            'auth'    => [$idMarket, $keyMarket],
            'headers' => ['Accept' => 'application/json'],
            'json'    => $GetSubscriptionParams,
            'verify' => false
        ]);
        $this->line($response->getBody());
    }
}
