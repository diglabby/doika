<?php

namespace Tests\Feature\Http\Controllers\Widget;

use Diglabby\Doika\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CampaignDonationResultControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider validTransactionStatusProvider
     */
    function it_disaplays_a_status_message($status)
    {
        $campaign = factory(Campaign::class)->create();

        $response = $this->get(route('widget.campaign.donation-result', ['campaign' => $campaign->id, 'status' => $status]));

        $response->assertOk();
        $response->assertSeeText($status);
    }

    function validTransactionStatusProvider(): array
    {
        return [
            ['success'],
            ['decline'],
            ['fail'],
        ];
    }
}
