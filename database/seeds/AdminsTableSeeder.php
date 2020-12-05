<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'username' => 'admin',
                'name' => 'GKeys',
                'password' => 'admin',
                'created_at' => '2018-08-28',
                'updated_at' => '2018-08-28',
            ),
        ));
        
        
    }
}