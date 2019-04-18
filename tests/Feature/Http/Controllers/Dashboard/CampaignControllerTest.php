<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CampaignControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_page_of_campaigns()
    {
        factory(Campaign::class, 16)->create();

        $response = $this
            ->withoutMiddleware()
            ->get(route('dashboard.campaigns.index'));

        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);
        $response->assertJsonCount(15, 'data');
    }

    /** @test */
    public function it_returns_page_of_campaigns_that_include_counts()
    {
        $campaign = factory(Campaign::class)->create();
        factory(Transaction::class, 1)->create([
            'campaign_id' => $campaign,
            'donator_id' => factory(Donator::class)->create(),
        ]);

        \DB::enableQueryLog();
        $response = $this
            ->withoutMiddleware()
            ->get(route('dashboard.campaigns.index'));
        \DB::disableQueryLog();

        $this->assertLessThanOrEqual(3, count(\DB::getQueryLog()));
        $response->assertJsonStructure([
            'data' => [[
                'id',
                'transactions_count',
                'subscriptions_count',
                'amount_collected',
            ]],
        ]);
        $response->assertJsonMissing(['data.transactions']);
    }
}
