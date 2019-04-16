<?php

namespace Tests\Feature\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Services\PaymentGateways\BePaidRecurrentPaymentGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Money\Money;
use Tests\TestCase;

class BePaidRecurrentPaymentGatewayTest extends TestCase
{
    use RefreshDatabase;

    /** @var BePaidRecurrentPaymentGateway */
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = resolve(BePaidRecurrentPaymentGateway::class);
    }

    /**
     * @test
     * @group real-api
     * @group network
     */
    public function it_creates_a_subscription()
    {
        /** @var Donator $donator */
        $donator = factory(Donator::class)->create();
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->create();
        $money = Money::BYN(100);

        $subscription = $this->service->createSubscription($money, $campaign, $donator, 'P1M');

        $this->assertSame('bePaid', $subscription->payment_gateway);
        $this->assertSame('BYN', $subscription->currency);
        $this->assertSame(100, $subscription->amount);
        $this->assertSame('P1M', $subscription->payment_interval);
        $this->assertSame(1, Subscription::query()->count());
    }
}
