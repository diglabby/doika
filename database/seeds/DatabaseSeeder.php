<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {        
        $this->call(UsersTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(RedirectionsTableSeeder::class);
        $this->call(SessionsTableSeeder::class);
    }
}
