<?php

namespace Tests\Feature\Http\Controllers\Webhooks\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Transaction;
use Tests\TestCase;

class BePaidWebhookHandlerTest extends TestCase
{
    /** @test */
    function it_creates_successful_transaction_from_webhook_request()
    {
        $this->withoutExceptionHandling();
        $campaign = factory(Campaign::class)->create();

        $response = $this->postJson(
            route('webhooks.bepaid.donated', $campaign->id),
            $this->loadRequestPayload('BePaidWebhookHandlerTest.donated.json')
        );

        $response->assertOk();
        $this->assertDatabaseHas('transactions', [
            'campaign_id' => $campaign->id,
            'subscription_id' => null,
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => '1-310b0da80b',
            'amount' => 100,
            'currency' => 'BYN',
            'status' => Transaction::STATUS_SUCCESSFUL,
        ]);
    }

    public function loadRequestPayload(string $fixtureFilename): array
    {
        $fixtureFile = __DIR__.DIRECTORY_SEPARATOR.$fixtureFilename;
        return json_decode(file_get_contents($fixtureFile), true);
    }
}
