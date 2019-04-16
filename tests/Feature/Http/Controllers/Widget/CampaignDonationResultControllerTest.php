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
    public function it_disaplays_a_status_message($status)
    {
        $campaign = factory(Campaign::class)->create();

        $response = $this->get(route('widget.campaign.donation-result', ['campaign' => $campaign->id, 'status' => $status]));

        $response->assertOk();
        $response->assertSeeText($status);
    }

    public function validTransactionStatusProvider(): array
    {
        return [
            ['success'],
            ['decline'],
            ['fail'],
        ];
    }
}
