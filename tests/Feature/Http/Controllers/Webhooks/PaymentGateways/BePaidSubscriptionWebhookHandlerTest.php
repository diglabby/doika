<?php

namespace Tests\Feature\Http\Controllers\Webhooks\PaymentGateways;

use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BePaidSubscriptionWebhookHandlerTest extends TestCase
{
    use RefreshDatabase;
    use LoadsRequestFixture;

    /** @test */
    function it_creates_a_new_transaction_on_success_subscription_renew()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        $requestData = $this->getRequestData('BePaidSubscriptionWebhookHandlerTest.active.json');
        /** @var Subscription $subscription */
        $subscription = factory(Subscription::class)->create([
            'campaign_id' => factory(Campaign::class)->create(),
            'payment_gateway_subscription_id' => $requestData['input']['id'],
        ]);

        $response = $this->postJson(
            route('webhooks.bepaid.subscriptions'),
            $requestData['input'],
            $requestData['headers']
        );

        $response->assertOk();
        $this->assertDatabaseHas('transactions', [
            'campaign_id' => $subscription->campaign_id,
            'subscription_id' => $subscription->id,
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => $requestData['input']['last_transaction']['uid'],
            'amount' => 100,
            'currency' => 'BYN',
            'status' => Transaction::STATUS_SUCCESSFUL,
        ]);
    }

    /** @test */
    function it_deletes_subscription_on_error()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        $requestData = $this->getRequestData('BePaidSubscriptionWebhookHandlerTest.canceled.json');
        /** @var Subscription $subscription */
        $subscription = factory(Subscription::class)->create([
            'campaign_id' => factory(Campaign::class)->create(),
            'payment_gateway_subscription_id' => $requestData['input']['id'],
        ]);

        $response = $this->postJson(
            route('webhooks.bepaid.subscriptions'),
            $requestData['input'],
            $requestData['headers']
        );

        $response->assertOk();
        $this->assertNotNull($subscription->refresh()->deleted_at);
    }
}
