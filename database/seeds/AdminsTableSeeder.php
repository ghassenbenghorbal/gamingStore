<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
                'password' => Hash::make('admin'),
                'created_at' => '2018-08-28',
                'updated_at' => '2018-08-28',
            ),
        ));
        
        
    }
}