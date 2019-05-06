<?php

use Diglabby\Doika\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        factory(Admin::class)->create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
    }
}
