<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */
    public function can_use_api_routes()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/api/admins');

        $response->assertOk();
    }
}
