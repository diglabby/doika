<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Admin::class)->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'password' => 'secret',
        ]);
    }
}
