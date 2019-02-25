<?php

namespace Tests\Feature\Backend;

use Tests\TestCase;
use App\Models\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class DashboardRouteTest.
 */
class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_users_cant_access_admin_dashboard()
    {
        $this->get('/doika/en/admin/campaigns')->assertRedirect('/doika/en/admin/login');
    }

    /** @test */
    public function not_authorized_users_cant_access_admin_dashboard()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/doika/en/admin/campaigns');

        $response->assertRedirect('/doika/en/admin/campaigns');
    }

    /** @test */
    public function admin_can_access_admin_dashboard()
    {
        $this->loginAsAdmin();

        $this->get('/doika/en/admin/campaigns')->assertStatus(200);
    }
}
