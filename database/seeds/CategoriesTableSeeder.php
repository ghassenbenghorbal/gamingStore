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
                'id' => 1,
                'name' => 'Steam',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),
            
            1 => 
            array (
                'id' => 2,
                'name' => 'Origin',
                'type' => 'PC',
                'created_at' => Carbon::now()
            ),
            
            2 => 
            array (
                'id' => 3,
                'name' => 'Uplay',
                'type' => 'PC',
                'created_at' => Carbon::now()
            )
        ));
        
        
    }
}