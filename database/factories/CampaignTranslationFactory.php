<?php

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\CampaignTranslation;

/**
 * @see https://github.com/fzaninotto/Faker#formatters
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

$factory->define(CampaignTranslation::class, function (Faker\Generator $faker) {
    return [
        'locale' => $faker->randomElement(['be', 'ru', 'en']),
        'name' => $faker->words(3, true),
        'description' => $faker->imageUrl(),
        'terms_of_use' => "<div>{$faker->sentence}<div>",
    ];
});

$factory->state(Campaign::class, 'with_campaign', [
    'campaign_id' => factory(Campaign::class)->lazy(),
]);
