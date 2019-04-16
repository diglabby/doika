<?php

use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Transaction;

/*
 * @see https://github.com/fzaninotto/Faker#formatters
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

$factory->define(Transaction::class, function (\Faker\Generator $faker) {
    return [
        'donator_id' => factory(Donator::class)->lazy(),
        'campaign_id' => factory(Campaign::class)->lazy(),
        'subscription_id' => null,
        'payment_gateway' => 'bePaid',
        'payment_gateway_transaction_id' => $faker->uuid,
        'amount' => 1000, // 10 BYN
        'currency' => 'BYN',
        'status' => 'successful',
        'status_message' => 'The operation was successfully processed.',
    ];
});

$factory->state(Transaction::class, 'successful', [
    'status' => 'successful',
    'status_message' => 'The operation was successfully processed.',
]);

$factory->state(Transaction::class, 'failed', [
    'status' => 'failed',
    'status_message' => 'Merchant terminal limits exceeded (maximum transaction amount). Transaction didn\'t pass anti-fraud checks.',
]);

$factory->state(Transaction::class, 'incomplete', [
    'status' => 'incomplete',
    'status_message' => 'Operation didn\'t pass 3-D Secure check',
]);
