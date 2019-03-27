<?php

namespace Diglabby\Doika\Models;

use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use GuzzleHttp\Client;

class RecurrentPayment
{
    protected const COUNTRY_OWNER = 'BY';

    protected const DEFAULT_VALUE = 'default';

    protected const BASE_PAYMENT_GATEWAY_URI = 'https://api.bepaid.by';

    protected const REDIRECT_URL = 'https://doika.falanster.by';

    protected $firstName;

    protected $lastName;

    protected $email;

    protected $phone;

    protected $idCustomer;

    protected $idPlan;

    protected $idSubscription;

    protected $responseFromPaymentGateway;

    protected $apiContext;

    protected $httpClient;

    public function __construct(BePaidApiContext $apiContext, HttpClient $httpClient, $firstName, $lastName, $email, $phone)
    {
        $this->apiContext = $apiContext;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->httpClient = $httpClient;
    }

    public function createCustomer()
    {
        $GetCustomerParams = [
            'test' => true,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => self::COUNTRY_OWNER,
            'ip' => self::DEFAULT_VALUE,
            'city' => self::DEFAULT_VALUE,
            'address' => self::DEFAULT_VALUE,
            'zip' => self::DEFAULT_VALUE
        ];
        $response = $this->httpClient->request('POST', '/customers', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $GetCustomerParams,
            'verify' => false,
        ]);
        $this->responseFromPaymentGateway = $response->getBody();
        $this->idCustomer = $this->responseFromPaymentGateway->id;

        return $this->responseFromPaymentGateway;
    }

    public function createPlan($planName)
    {
        $GetTokenParams = [
            'test' => true,
            'title' => $planName,
            'currency' => 'BYN',
            'plan' => [
                'amount' => 20,
                'interval' => 20,
                'interval_unit' => 'day'
            ],
            'language' => 'ru',
            'infinite' => true
        ];
        $response = $this->httpClient->request('POST', '/plans', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $GetTokenParams,
            'verify' => false
        ]);
        $this->responseFromPaymentGateway = $response->getBody();
        $this->idPlan = $this->responseFromPaymentGateway->id;

        return $this->responseFromPaymentGateway;
    }

    public function createSubscription()
    {
        $GetSubscriptionParams = [
            'customer' => [
                'id' => $this->idCustomer
            ],
            'plan' => [
                'id' => $this->idPlan
            ],
            'return_url' => self::REDIRECT_URL,
            'settings' => [
                'language' => 'ru'
            ]
        ];
        $response = $this->httpClient->request('POST', '/subscriptions', [
            'auth' => [$this->apiContext->marketId, $this->apiContext->marketKey],
            'headers' => ['Accept' => 'application/json'],
            'json' => $GetSubscriptionParams,
            'verify' => false
        ]);

        $this->responseFromPaymentGateway = $response->getBody();
        $this->idSubscription = $this->responseFromPaymentGateway->id;

        return $this->responseFromPaymentGateway;
    }
}
