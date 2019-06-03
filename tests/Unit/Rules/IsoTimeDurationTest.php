<?php

namespace Tests\Unit\Rules;

use Diglabby\Doika\Rules\IsoTimeDuration;
use PHPUnit\Framework\TestCase;

class IsoTimeDurationTest extends TestCase
{
    /** @var IsoTimeDuration */
    private $rule;

    protected function setUp(): void
    {
        parent::setUp();
        $this->rule = new IsoTimeDuration();
    }

    /**
     * @test
     * @dataProvider validDurationsProvider
     */
    public function it_passes_on_valid_input(string $duration)
    {
        $this->assertTrue($this->rule->passes('interval', $duration));
    }

    public function validDurationsProvider(): array
    {
        return [
            ['P1Y'],
            ['P1M'],
            ['P1W'],
            ['PT1H'],
            ['PT1M'],
            ['PT1S'],

            ['P2M'],

            ['P1Y2MT1H'],
        ];
    }

    /**
     * @test
     * @dataProvider invalidDurationsProvider
     */
    public function it_fails_on_invalid_input(string $duration)
    {
        $this->assertFalse($this->rule->passes('interval', $duration));
    }

    public function invalidDurationsProvider(): array
    {
        return [
            ['P1H'],
            ['1H'],
            ['1M'],
            ['T1M'],
            ['P1Y1H'],
        ];
    }
}
