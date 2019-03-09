<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function can_open_home_page()
    {
        $response = $this->get('/doika/en/campaign/1');

        $response->assertOk();
    }
}
