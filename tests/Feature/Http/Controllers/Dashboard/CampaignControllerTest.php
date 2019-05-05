<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Middleware\Authenticate;
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

    /** @test */
    public function it_returns_single_campaign()
    {
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->create();

        $response = $this
            ->withoutMiddleware([Authenticate::class])
            ->get(route('dashboard.campaigns.show', [$campaign->id]));

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'picture_url',
                'target_amount',
                'currency',
                'active_status',
                'started_at',
                'finished_at',
                'amount_collected',
            ],
        ]);
    }

    /** @test */
    public function it_updates_a_campaign()
    {
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->create(['active_status' => false]);

        $response = $this
            ->withoutMiddleware([Authenticate::class])
            ->put(route('dashboard.campaigns.update', [$campaign->id]), [
                'active_status' => true,
            ]);

        $response->assertOk();
        $this->assertTrue($response->json('active_status'));
        $this->assertTrue($campaign->refresh()->active_status);
    }

    /** @test */
    public function it_deletes_a_campaign()
    {
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->create();

        $response = $this
            ->withoutMiddleware([Authenticate::class])
            ->delete(route('dashboard.campaigns.delete', [$campaign->id]));

        $response->assertOk();
        $this->assertNotNull($response->json('deleted_at'));
        $this->assertSame(0, Campaign::query()->count());
    }
}
