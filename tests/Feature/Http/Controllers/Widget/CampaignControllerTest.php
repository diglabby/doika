<?php

namespace Tests\Feature\Http\Controllers\Widget;

use Tests\TestCase;

class CampaignControllerTest extends TestCase
{
    /** @test */
    public function it_displays_campaign()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('widget.campaign.show', [1]));

        $response->assertOk();
        $response->assertViewIs('widget.pages.campaigns.show');
    }
}
