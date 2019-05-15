<?php

use Diglabby\Doika\Models\Admin;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Database\Seeder;

final class TestingSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class, 3)->create(['password' => Hash::make('123')]);
        /** @var \Illuminate\Support\Collection $campaigns */
        $campaigns = factory(Campaign::class, 8)->create();
        factory(Transaction::class, 27)->create();
        factory(Subscription::class, 12)->create(['campaign_id' => $campaigns->first()->id]);
        factory(Subscription::class, 2)->state('canceled')->create(['campaign_id' => $campaigns->last()->id]);
    }
}
