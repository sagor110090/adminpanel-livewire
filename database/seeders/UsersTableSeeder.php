<?php

namespace Database\Seeders;

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
                'id' => 1,
                'name' => 'Mehedi Hasan Sagor',
                'email' => 'developer@sagor.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3sQShJqP6ITG8NwpLz.d3OPk09tU6eBvPXh3R33O1LWHEmXYj17U6',
                'remember_token' => NULL,
                'created_at' => '2021-10-16 10:12:25',
                'updated_at' => '2021-10-16 10:12:25',
            ),
        ));
        
        
    }
}