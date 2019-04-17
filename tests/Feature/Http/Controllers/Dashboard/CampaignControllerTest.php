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
            'current_page',
            'data',
            'first_page_url',
            'from',
            'next_page_url',
            'path',
            'per_page',
            'prev_page_url',
            'to',
        ]);
        $response->assertJsonCount(15, 'data');
    }

    /** @test */
    public function it_returns_page_of_campaigns_that_include_donators()
    {
        factory(Transaction::class)->create([
            'campaign_id' => factory(Campaign::class)->create(),
            'donator_id' => factory(Donator::class)->create(),
        ]);

        $response = $this
            ->withoutMiddleware()
            ->get(route('dashboard.campaigns.index', ['include' => ['transactions']]));

        $response->assertJsonStructure([
            'data' => [['id', 'transactions']],
        ]);
    }
}
