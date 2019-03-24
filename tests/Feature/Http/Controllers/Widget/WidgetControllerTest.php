<?php

namespace Tests\Feature\Http\Controllers\Widget;

use Tests\TestCase;

class WidgetControllerTest extends TestCase
{
    /** @test */
    function it_can_open_widget()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('widget.home'));

        $response->assertOk();
    }
}
