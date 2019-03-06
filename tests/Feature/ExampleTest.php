<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function can_open_home_page()
    {
        $response = $this->get(localize_url('en', route('home')));

        $response->assertOk(200);
    }
}
