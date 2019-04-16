<?php

namespace Tests\Feature\Services\PaymentGateways;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Services\PaymentGateways\BePaidPaymentGateway;
use Money\Money;
use Tests\TestCase;

class BePaidOffsitePaymentGatewayTest extends TestCase
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
}
