<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;

class TryRecurrentBePaidCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurrent_be_paid_customer:try {first_name} {last_name} {email} {phone} {id_market} {key_market}';

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
        $firstName = $this->argument('first_name');
        $lastName = $this->argument('last_name');
        $email = $this->argument('email');
        $phone = $this->argument('phone');
        $idMarket = $this->argument('id_market');
        $keyMarket = $this->argument('key_market');

        $GetCustomerParams = [
            "test" => true,
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            "phone" => $phone,
            "country" => "BY",
            "ip" => "default",
            "city" => "default",
            "address" => "default",
            "zip" => "default"
        ];
        $client = new Client([
            'base_uri' => "https://api.bepaid.by"
        ]);
        $response = $client->request('POST', '/customers', [
            'auth'    => [$idMarket, $keyMarket],
            'headers' => ['Accept' => 'application/json'],
            'json'    => $GetCustomerParams,
            'verify' => false
        ]);
        $this->line($response->getBody());
    }
}
