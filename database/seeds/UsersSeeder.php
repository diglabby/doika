<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createDemoUser();
    }

    private function createDemoUser()
    {
        return factory(User::class)->create([
            'name' => 'Demo',
            'email' => 'demo@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$AQlsiM6XRfGZXRdu58Qo7OjVRRkZCXNekV/lst2OQUKCX59FDH/Ie',
            'active' => 1,
            'remember_token' => 'P6oRtEtT9rLLCcd1YHudQMyFYUsfysWfOcDE7pPdye2rCZbvKbF3PnaUbgRP',
            'locale' => 'en',
            'timezone' => 'UTC',
            'slug' => 'demo',
            'last_access_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
