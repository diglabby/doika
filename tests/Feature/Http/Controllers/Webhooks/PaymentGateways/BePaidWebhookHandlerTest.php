<?php

namespace Tests\Feature\Http\Controllers\Webhooks\PaymentGateways;

use Tests\TestCase;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;

class BePaidWebhookHandlerTest extends TestCase
{
    use RefreshDatabase;
    use LoadsRequestFixture;

    /** @test */
    public function it_creates_successful_transaction_from_webhook_request()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->create();

        $requestData = $this->getRequestData('BePaidWebhookHandlerTest.donated.json');
        $response = $this->postJson(
            route('webhooks.bepaid.donated', $campaign->id),
            $requestData['input'],
            $requestData['headers']
        );

        $response->assertOk();
        $this->assertDatabaseHas('transactions', [
            'campaign_id' => $campaign->id,
            'subscription_id' => null,
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => '12019567-c74ce49914',
            'amount' => 500,
            'currency' => 'BYN',
            'status' => Transaction::STATUS_SUCCESSFUL,
        ]);
        $this->assertDatabaseHas('donators', [
            'email' => 'jake@example.com',
        ]);
    }
}
