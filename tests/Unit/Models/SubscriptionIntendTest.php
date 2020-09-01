<?php

namespace Tests\Unit\Models;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\SubscriptionIntend;
use Illuminate\Support\Carbon;
use Money\Money;
use Tests\TestCase;

class SubscriptionIntendTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $now = now();
        Carbon::setTestNow($now);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        Carbon::setTestNow();
    }

    /**
     * @test
     * @dataProvider plannedTimesToPayForFutureDatesProvider
     */
    public function it_properly_calculates_times_to_pay_for_future_dates(int $plannedTimesToPay, \DateTimeInterface $dateTime)
    {
        // Add few seconds to avoid runtime errors
        $campaignFinishTime = (clone $dateTime)->addSeconds(2);
        $subscriptionIntend = SubscriptionIntend::monthly(
            Money::BYN(100),
            factory(Donator::class)->make(),
            factory(Campaign::class)->make(['finish_at' => $campaignFinishTime])
        );

        $calculatedTimesToPay = $subscriptionIntend->getBillingCyclesCount();

        $this->assertSame($plannedTimesToPay, $calculatedTimesToPay);
    }

    public function plannedTimesToPayForFutureDatesProvider(): array
    {
        return [
            'finish in few seconds'     => [1, now()->addSeconds(1)],
            'finish in 1 minute'        => [1, now()->addMinutes(1)],
            'finish in 1 day'           => [1, now()->addDays(1)],
            'finish in 1 week'          => [1, now()->addWeeks(1)],
            'finish in almost 1 month'  => [1, now()->addMonthsWithOverflow(1)->subMinutes(1)],
            'finish in 1 month'         => [2, now()->addMonthsWithOverflow(1)],
            'finish in almost 2 months' => [2, now()->addMonthsWithOverflow(2)->subMinutes(1)],
            'finish in 2 month'         => [3, now()->addMonthsWithOverflow(2)],
            'finish in 1 year'          => [13, now()->addYearsWithOverflow(1)],
        ];
    }

    /**
     * @test
     * @dataProvider pastDatesProvider
     */
    public function can_not_calculate_times_to_pay_for_past_dates(\DateTime $campaignFinishTime)
    {
        $this->expectException(\DomainException::class);

        $subscriptionIntend = SubscriptionIntend::monthly(
            Money::BYN(100),
            factory(Donator::class)->make(),
            factory(Campaign::class)->make(['finish_at' => $campaignFinishTime])
        );

        $subscriptionIntend->getBillingCyclesCount();
    }

    public function pastDatesProvider(): array
    {
        return [
            [today()],
            [now()->subSecond()],
            [now()->subMinute()],
            [now()->subHour()],
            [now()->subWeek()],
            [now()->subMonth()],
            [now()->subYear()],
        ];
    }
}
