<?php

namespace Tests\Feature\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\SubscriptionIntend;
use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Money\Money;
use Tests\TestCase;

class BePaidPaymentGatewayTest extends TestCase
{
    private const MARKET_ID = 1111;
    private const MARKET_KEY = 'random_valid_key';

    /** @var BePaidPaymentGateway */
    private $bePaid;

    protected function setUp(): void
    {
        parent::setUp();
        $this->app->bind(BePaidApiContext::class, function () {
            return new BePaidApiContext([
                'marketId' => self::MARKET_ID,
                'marketKey' => self::MARKET_KEY,
                'mode' => 'test',
            ]);
        });

        $this->bePaid = resolve(BePaidPaymentGateway::class);
    }

    /** @test */
    public function it_throws_an_exception_on_zero_amount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $this->bePaid->tokenizePaymentIntend(Money::BYN(0), $donator, $campaign);
    }

    /** @test */
    public function it_throws_an_exception_on_nagative_amount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $this->bePaid->tokenizePaymentIntend(Money::BYN(-20), $donator, $campaign);
    }

    /**
     * ⚠ This test works with real integration data only!
     * @test
     * @group real-api
     * @group network
     */
    public function it_returns_payment_token()
    {
        $donator = factory(Donator::class)->make();
        $campaign = factory(Campaign::class)->make();

        $redirectUrl = $this->bePaid->tokenizePaymentIntend(Money::BYN(100), $donator, $campaign);

        $this->assertContains('?token=', $redirectUrl);
    }

    /**
     * ⚠ This test works with real integration data only!
     * @test
     * @group real-api
     * @group network
     */
    public function it_creates_a_subscription()
    {
        /** @var Donator $donator */
        $donator = factory(Donator::class)->make(['id' => 1]);
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->make(['id' => 1]);
        $subscriptionIntend = SubscriptionIntend::monthly(Money::BYN(100), $donator, $campaign);

        $redirectUrl = $this->bePaid->tokenizeSubscriptionIntend($subscriptionIntend);

        $this->assertContains('?token=', $redirectUrl);
    }
}
