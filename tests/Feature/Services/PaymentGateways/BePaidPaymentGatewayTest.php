<?php

namespace Tests\Feature\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Money\Money;
use Tests\TestCase;

class BePaidPaymentGatewayTest extends TestCase
{
    /** @var BePaidPaymentGateway */
    private $bePaid;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bePaid = resolve(BePaidPaymentGateway::class);
    }

    /**
     * @test
     * @group real-api
     * @group network
     */
    public function it_returns_payment_token()
    {
        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $token = $this->bePaid->tokenizePayment(Money::BYN(100), $donator, $campaign);

        $this->assertSame(64, strlen($token));
    }

    /** @test */
    public function it_throws_an_exception_on_zero_amount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $this->bePaid->tokenizePayment(Money::BYN(0), $donator, $campaign);
    }

    /** @test */
    public function it_throws_an_exception_on_nagative_amount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $this->bePaid->tokenizePayment(Money::BYN(-20), $donator, $campaign);
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

        $subscription = $this->bePaid->subscribe($donator, $campaign, $money, 'P1M');

        $this->assertSame('bePaid', $subscription->payment_gateway);
        $this->assertSame('BYN', $subscription->currency);
        $this->assertSame(100, $subscription->amount);
        $this->assertSame('P1M', $subscription->payment_interval);
        $this->assertSame(1, Subscription::query()->count());
    }
}
