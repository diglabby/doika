<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function visitor_can_open_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertViewIs('dashboard.pages.auth.login');
    }

    /** @test */
    function admin_can_login()
    {
        $admin = factory(Admin::class)->create([
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->post(route('login', ['email' => 'example@example.com', 'password' => 'secret']));

        $this->assertAuthenticatedAs($admin);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('dashboard.home'));
    }

    /** @test */
    function it_displays_error_on_invalid_email()
    {
        factory(Admin::class)->create([
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->post(route('login', ['email' => 'example🤬@example.com', 'password' => 'secret']));

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    function it_displays_error_on_invalid_password()
    {
        factory(Admin::class)->create([
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->post(route('login', ['email' => 'example@example.com', 'password' => '🤬secret']));

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }
}
