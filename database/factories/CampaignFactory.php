<?php

use Diglabby\Doika\Models\Campaign;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

$factory->define(Campaign::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words(3, true),
        'description' => $faker->sentence,
        'picture_url' => $faker->imageUrl(640, 640, 'animals'),
        'target_amount' => $faker->randomDigit * 1000, // in cents,
        'currency' => 'BYN',
        'active_status' => 1,
        'started_at' => today(),
        'finished_at' => today()->addMonths(1),
        'visual_settings' => [
            'buttons' => [5, 10, 25, 50],
            'progressBar' => true,
            'colors' => [
                'widgetBackground' => null,
                'buttonBackground' => null,
                'progressBarColor' => null,
                'fontColor' => null,
            ],
        ],
    ];
});

$factory->state(Campaign::class, 'inactive', [
    'active_status' => 0,
]);

$factory->state(Campaign::class, 'active', [
    'active_status' => 1,
]);
