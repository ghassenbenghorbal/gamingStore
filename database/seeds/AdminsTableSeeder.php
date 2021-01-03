<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
                'name' => 'Administrator',
                'password' => Hash::make('admin'),
                'created_at' => Carbon::now(),
            ),
        ));


    }
}
