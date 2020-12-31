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
                'image' => 'uploads/1.jpg',
                'description' => 'Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. It is the first main entry in the Grand Theft Auto series since 2008\'s Grand Theft Auto IV',
                'price' => 70,
                'genre' => "Action",
                'discount' => null,
                'tag' => 'HOT',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'FIFA 21',
                'image' => 'uploads/2.jpg',
                'description' => 'FIFA 21 is a football simulation video game published by Electronic Arts as part of the FIFA series. It is the 28th installment in the FIFA series, and was released 9 October 2020 for Microsoft Windows, Nintendo Switch, PlayStation 4 and Xbox One.',
                'price' => 135,
                'genre' => 'Sports',
                'discount' => 130,
                'tag' => 'New',
                'category_id' => 2,
                'created_at' => Carbon::now()
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Cyberpunk 2077',
                'image' => 'uploads/3.jpg',
                'description' => 'Cyberpunk 2077 is an upcoming action role-playing video game developed and published by CD Projekt. It is scheduled to be released for Microsoft Windows, PlayStation 4, PlayStation 5, Stadia, Xbox One, and Xbox Series X/S on 10 December 2020.',
                'price' => 210,
                'genre' => 'Action',
                'discount' => 205,
                'tag' => 'Pre-Order',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Among Us',
                'image' => 'uploads/4.jpg',
                'description' => 'Among Us is an online multiplayer social deduction game developed and published by American game studio Innersloth and released on June 15, 2018. The game takes place in a space-themed setting, in which players each take on one of two roles, most being Crewmates, and a predetermined number being Impostors.',
                'price' => 25,
                'genre' => 'Social Deduction',
                'discount' => 20,
                'tag' => 'HOT',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            4 =>
            array (
                'id' => 5,
                'name' => "Tom Clancy's Rainbow Six Siege",
                'image' => 'uploads/5.jpg',
                'description' => 'Tom Clancy\'s Rainbow Six Siege is an online tactical shooter video game developed by Ubisoft Montreal and published by Ubisoft.',
                'price' => 30,
                'genre' => 'Tactical shooter',
                'discount' => null,
                'tag' => 'HOT',
                'category_id' => 3,
                'created_at' => Carbon::now()
            ),
            5 =>
            array (
                'id' => 6,
                'name' => "Assassin's Creed Valhalla",
                'image' => 'uploads/6.jpg',
                'description' => 'Assassin\'s Creed Valhalla is an action role-playing video game developed by Ubisoft Montreal and published by Ubisoft. It is the twelfth major installment and the twenty-second release in the Assassin\'s Creed series, and a successor to the 2018 game Assassin\'s Creed Odyssey.',
                'price' => 160,
                'genre' => 'Action',
                'discount' => null,
                'tag' => 'HOT',
                'category_id' => 3,
                'created_at' => Carbon::now()
            )
        ));


    }
}
