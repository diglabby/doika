<?php

namespace Tests\Feature\Http\Controllers\Widget;

use Tests\TestCase;

class WidgetControllerTest extends TestCase
{
    /** @test */
    function it_can_open_widget()
    {
        $response = $this->get(route('home'));

        $response->assertOk();
    }
}
