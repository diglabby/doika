<?php

use Diglabby\Doika\Models\Admin;
use Illuminate\Database\Seeder;

final class AdminSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class)->create([
            'locale' => 'ua',
            'email' => 'demo@example.com',
            'password' => Hash::make('demo123'), // demo
            'name' => 'Demo Admin',
        ]);
    }
}
