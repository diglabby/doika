<?php

use Diglabby\Doika\Models\Admin;
use Illuminate\Database\Seeder;

final class AdminSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class)->create([
            'email' => 'demo@example.com',
            'password' => Hash::make('demo'), // demo
            'name' => 'Demo Admin',
        ]);
    }
}
