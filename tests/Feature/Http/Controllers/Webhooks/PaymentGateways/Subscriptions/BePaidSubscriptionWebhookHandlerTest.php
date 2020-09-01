<?php

namespace Tests\Feature\Http\Controllers\Webhooks\PaymentGateways\Subscriptions;

use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;
use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\Http\Controllers\Webhooks\PaymentGateways\LoadsRequestFixture;
use Tests\TestCase;

class BePaidSubscriptionWebhookHandlerTest extends TestCase
{
    use RefreshDatabase;
    use LoadsRequestFixture;

    /** @test */
    public function it_creates_a_new_subscription()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        $requestData = $this->getRequestData('created.subscription.json');
        factory(Campaign::class)->create(['id' => $requestData['additional_data']['campaign_id']]);
        factory(Donator::class)->create(['id' => $requestData['additional_data']['donator_id']]);

        $response = $this->postJson(
            route('webhooks.bepaid.subscriptions'),
            $requestData
        );

        $response->assertOk();
        $this->assertDatabaseHas('subscriptions', [
            'campaign_id'     => $requestData['additional_data']['campaign_id'],
            'donator_id'      => $requestData['additional_data']['donator_id'],
            'payment_gateway' => 'bePaid',
        ]);
    }

    /** @test */
    public function it_deletes_subscription_on_canceleation_initialed_outside_our_app()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        $requestData = $this->getRequestData('canceled.subscription.json');
        /** @var Subscription $subscription */
        $subscription = factory(Subscription::class)->create([
            'campaign_id'                     => factory(Campaign::class)->create(),
            'payment_gateway_subscription_id' => $requestData['id'],
        ]);

        $response = $this->postJson(
            route('webhooks.bepaid.subscriptions'),
            $requestData
        );

        $response->assertOk();
        $this->assertNotNull($subscription->refresh()->deleted_at);
    }

    /** @test */
    public function it_creates_failed_transaction_on_failed_subscription()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware([VerifyBePaidSignature::class]);
        $requestData = $this->getRequestData('failed.subscription.json');
        factory(Donator::class)->create(['id' => $requestData['additional_data']['donator_id']]);
        factory(Campaign::class)->create(['id' => $requestData['additional_data']['campaign_id']]);

        $response = $this->postJson(
            route('webhooks.bepaid.subscriptions'),
            $requestData
        );

        $response->assertOk();
        $this->assertSame(1, Transaction::query()->count());
    }
}
