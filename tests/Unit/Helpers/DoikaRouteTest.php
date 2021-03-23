<?php declare(strict_types=1);

namespace Tests\Unit\Helpers;

use Illuminate\Support\Facades\Config;
use Tests\TestCase;

/** @internal */
final class DoikaRouteTest extends TestCase
{
    /** @test */
    public function it_generates_a_route_for_doika_installed_to_site_root(): void
    {
        Config::set('doika.url_prefix', 'doika');

        $doikaRoute = doika_route('login', [], false);

        $this->assertSame('/dashboard/login', $doikaRoute);
    }

    /** @test */
    public function it_generates_a_route_for_doika_installed_to_subdirectory(): void
    {
        Config::set('doika.url_prefix', 'doika');

        $doikaRoute = doika_route('login', [], false);

        $this->assertSame('/doika/dashboard/login', $doikaRoute);
    }

    /** @test */
    public function it_generates_a_route_for_doika_installed_to_subdirectory_2nd_lvl(): void
    {
        Config::set('doika.url_prefix', 'payments/doika');

        $doikaRoute = doika_route('login', [], false);

        $this->assertSame('/payments/doika/dashboard/login', $doikaRoute);
    }
}
