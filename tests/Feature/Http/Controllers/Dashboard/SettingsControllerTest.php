<?php

namespace Tests\Feature\Http\Controllers\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_gets_settings()
    {
        setting()->set('existing_key', 'value');
        setting()->save();

        $response = $this->withoutMiddleware()
            ->get(route('dashboard.settings.index', ['keys' => ['existing_key', 'not_existing_key']]));

        $response->assertJson(['settings' => [
            'existing_key' => 'value',
            'not_existing_key' => null,
        ]]);
    }

    /** @test */
    public function it_stores_settings()
    {
        $response = $this->withoutMiddleware()
            ->post(route('dashboard.settings.store'), ['settings' => [
                'string_value' => 'string value',
                'empty_value' => '',
                'numeric_value' => 2,
            ]]);

        $response->assertJson(['settings' => [
            'string_value' => 'string value',
            'empty_value' => '',
            'numeric_value' => '2',
        ]]);
    }
}
