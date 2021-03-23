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
        Config::set('doika.url_prefix', '');

        $doikaRelativeUrl = doika_route('login', [], false);
        $doikaAbsoluteUrl = doika_route('login');

        $this->assertSame('/dashboard/login', $doikaRelativeUrl);
        $this->assertSame('http://localhost/dashboard/login', $doikaAbsoluteUrl);
    }

    /** @test */
    public function it_generates_a_route_for_doika_installed_to_subdirectory(): void
    {
        Config::set('doika.url_prefix', 'doika');

        $doikaRelativeUrl = doika_route('login', [], false);
        $doikaAbsoluteUrl = doika_route('login');

        $this->assertSame('/doika/dashboard/login', $doikaRelativeUrl);
        $this->assertSame('http://localhost/doika/dashboard/login', $doikaAbsoluteUrl);
    }

    /** @test */
    public function it_generates_a_route_for_doika_installed_to_subdirectory_2nd_lvl(): void
    {
        Config::set('doika.url_prefix', 'payments/doika');

        $doikaRelativeUrl = doika_route('login', [], false);
        $doikaAbsoluteUrl = doika_route('login');

        $this->assertSame('/payments/doika/dashboard/login', $doikaRelativeUrl);
        $this->assertSame('http://localhost/payments/doika/dashboard/login', $doikaAbsoluteUrl);
    }
}
