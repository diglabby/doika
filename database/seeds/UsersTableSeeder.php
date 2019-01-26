<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 4,
                'name' => 'Demo',
                'email' => 'demo@example.com',
                'email_verified_at' => '2018-10-24 19:13:17',
                'password' => '$2y$10$AQlsiM6XRfGZXRdu58Qo7OjVRRkZCXNekV/lst2OQUKCX59FDH/Ie',
                'active' => 1,
                'remember_token' => 'SahYSk4aYDXa8ppZCoKG1HktetAzdx8EGcwTVFitly04dJbDqjUSNgZhKnvi',
                'locale' => 'en',
                'timezone' => 'UTC',
                'slug' => 'demo',
                'last_access_at' => '2019-01-25 09:35:55',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2019-01-25 09:35:55',
            ),
        ));
        
        
    }
}