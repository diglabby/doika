<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\Admin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitor_can_open_login_page()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertViewIs('dashboard.pages.auth.login');
    }

    /** @test */
    public function admin_can_login()
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
    public function it_displays_error_on_invalid_email()
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
    public function it_displays_error_on_invalid_password()
    {
        factory(Admin::class)->create([
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this->post(route('login', ['email' => 'example@example.com', 'password' => '🤬secret']));

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function admin_can_logout()
    {
        $admin = factory(Admin::class)->create([
            'email' => 'example@example.com',
            'password' => bcrypt('secret'),
        ]);

        $response = $this
            ->actingAs($admin)
            ->post(route('logout'));

        $this->assertGuest();
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }
}
