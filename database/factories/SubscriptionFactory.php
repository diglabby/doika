<?php

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */
$factory->define(Subscription::class, function (\Faker\Generator $faker) {
    return [
        'donator_id' => factory(Donator::class)->lazy(),
        'campaign_id' => factory(Campaign::class)->lazy(),
        'payment_gateway' => 'bePaid',
        'payment_gateway_subscription_id' => $faker->uuid,
        'amount' => $faker->numberBetween(1, 100) * 100, // in cents
        'currency' => 'BYN',
        'payment_interval' => 'P1M',
        'cancel_reason' => null,
    ];
});

$factory->state(Subscription::class, 'canceled', function () {
    return [
        'cancel_reason' => "Customer's request",
        'deleted_at' => now()->subMinutes(10),
    ];
});
