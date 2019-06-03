<?php

namespace Tests\Unit\Models;

use Diglabby\Doika\Models\Campaign;
use Diglabby\Doika\Models\Donator;
use Diglabby\Doika\Models\SubscriptionIntend;
use Money\Money;
use Tests\TestCase;

class SubscriptionIntendTest extends TestCase
{
    /**
     * @test
     * @dataProvider plannedTimesToPayForFutureDatesProvider
     */
    public function it_properly_calculates_times_to_pay_for_future_dates(int $plannedTimesToPay, string $dateMofifier)
    {
        // ⚠️ Test execution takes some tune, for this reason now() created here
        // != now() created in SubscriptionIntend, so we need to add second(s)
        $campaignFinishTime = now()->modify($dateMofifier)->modify('+5 second');
        $subscriptionIntend = SubscriptionIntend::monthly(
            Money::BYN(100),
            factory(Donator::class)->make(),
            factory(Campaign::class)->make(['finished_at' => $campaignFinishTime])
        );

        $calculatedTimesToPay = $subscriptionIntend->getBillingCyclesCount();

        $this->assertSame($plannedTimesToPay, $calculatedTimesToPay);
    }

    public function plannedTimesToPayForFutureDatesProvider(): array
    {
        return [
            'finish in few seconds' => [1, '+1 seconds'],
            'finish in 1 minute' => [1, '+1 minute'],
            'finish in 1 day' => [1, '+1 day'],
            'finish in 1 week' => [1, '+1 week'],
            'finish in almost 1 month' => [1, '+1 month -1 minute'],
            'finish in 1 month' => [2, '+1 month'],
            'finish in almost 2 months' => [2, '+2 months -1 minute'],
            'finish in 2 month' => [3, '+2 month'],
            'finish in 1 year' => [13, '+1 year'],
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
            factory(Campaign::class)->make(['finished_at' => $campaignFinishTime])
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
