<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Grand Theft Auto V',
                'image_name' => '1.jpg',
                'description' => "Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the first main entry in the Grand Theft Auto series since 2008's Grand Theft Auto IV",
                'price' => 70,
                'discount' => 65,
                'tag' => 'HOT',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'FIFA 21',
                'image_name' => '2.jpg',
                'description' => 'FIFA 21 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 28th installment in the FIFA series, and was released 9 October 2020 for Microsoft Windows, Nintendo Switch, PlayStation 4 and Xbox One.',
                'price' => 135,
                'discount' => 130,
                'tag' => 'New',
                'category_id' => 2,
                'created_at' => Carbon::now()
            )
        ));
        
        
    }
}