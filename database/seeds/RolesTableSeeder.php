<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'administrator',
                'display_name' => '{"en": "Administrator", "ru": "Администратор"}',
                'description' => '{"en": "Access to mostly web features", "ru": "Доступ к большинству возможностей сайта"}',
                'order' => 0,
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
        ));
        
        
    }
}