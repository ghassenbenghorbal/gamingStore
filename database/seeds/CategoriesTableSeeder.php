<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'name' => 'Steam',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),

            1 =>
            array (
                'name' => 'Origin',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),

            2 =>
            array (
                'name' => 'Uplay',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),
            3 =>
            array (
                'name' => 'Battle.net',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),
            4 =>
            array (
                'name' => 'Epic Games',
                'type' => 'PC',
                'created_at' => Carbon::now()
            )
        ));


    }
}
