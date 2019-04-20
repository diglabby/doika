<?php

namespace Tests\Feature\Http\Controllers\Widget;

use Diglabby\Doika\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CampaignControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_campaign()
    {
        $campaign = factory(Campaign::class)->create();

        $response = $this->get(route('widget.campaign.show', [$campaign->id]));

        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'picture_url',
                'visual_settings',
                'amount_collected',
            ],
        ]);
    }
}
