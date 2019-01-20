<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class TryRecurrentBePaidPlan extends Command
{
     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurrent_be_paid_plan:try {plan} {id_market} {key_market}';

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
        $planName = $this->argument('plan');
        $idMarket = $this->argument('id_market');
        $keyMarket = $this->argument('key_market');
        //Добавляем параметры для запроса плана
        $GetTokenParams = [
            "test" => true,
            "title" => $planName,
            "currency" => "BYN",
            "plan" => [
                "amount" => 20,
                "interval" => 20,
                "interval_unit" => "day"
            ],
            "language"=> "ru",
            "infinite" => true
        ];
        $client = new Client([
            'base_uri' => "https://api.bepaid.by"
        ]);
        $response = $client->request('POST', '/plans', [
            'auth'    => [$idMarket, $keyMarket],
            'headers' => ['Accept' => 'application/json'],
            'json'    => $GetTokenParams,
            'verify' => false
        ]);
        $this->line($response->getBody());
    }
}
