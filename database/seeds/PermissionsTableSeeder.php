<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'access backend',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            1 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'view campaigns',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            2 => 
            array (
                'id' => 3,
                'role_id' => 1,
                'name' => 'create campaigns',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            3 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'name' => 'edit campaigns',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            4 => 
            array (
                'id' => 5,
                'role_id' => 1,
                'name' => 'delete campaigns',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 1,
                'name' => 'publish campaigns',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            6 => 
            array (
                'id' => 7,
                'role_id' => 1,
                'name' => 'view form_settings',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            7 => 
            array (
                'id' => 8,
                'role_id' => 1,
                'name' => 'create form_settings',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            8 => 
            array (
                'id' => 9,
                'role_id' => 1,
                'name' => 'edit form_settings',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            9 => 
            array (
                'id' => 10,
                'role_id' => 1,
                'name' => 'delete form_settings',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            10 => 
            array (
                'id' => 13,
                'role_id' => 1,
                'name' => 'view users',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            11 => 
            array (
                'id' => 14,
                'role_id' => 1,
                'name' => 'create users',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            12 => 
            array (
                'id' => 15,
                'role_id' => 1,
                'name' => 'edit users',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            13 => 
            array (
                'id' => 16,
                'role_id' => 1,
                'name' => 'delete users',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            14 => 
            array (
                'id' => 17,
                'role_id' => 1,
                'name' => 'impersonate users',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            15 => 
            array (
                'id' => 18,
                'role_id' => 1,
                'name' => 'view roles',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            16 => 
            array (
                'id' => 19,
                'role_id' => 1,
                'name' => 'create roles',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            17 => 
            array (
                'id' => 20,
                'role_id' => 1,
                'name' => 'edit roles',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            18 => 
            array (
                'id' => 21,
                'role_id' => 1,
                'name' => 'delete roles',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            19 => 
            array (
                'id' => 26,
                'role_id' => 1,
                'name' => 'view redirections',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            20 => 
            array (
                'id' => 27,
                'role_id' => 1,
                'name' => 'create redirections',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            21 => 
            array (
                'id' => 28,
                'role_id' => 1,
                'name' => 'edit redirections',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
            22 => 
            array (
                'id' => 29,
                'role_id' => 1,
                'name' => 'delete redirections',
                'created_at' => '2018-10-24 19:13:17',
                'updated_at' => '2018-10-24 19:13:17',
            ),
        ));
        
        
    }
}