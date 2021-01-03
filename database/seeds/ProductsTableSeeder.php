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
                'name' => 'DayZ',
                'image' => 'uploads/3.jpg',
                'description' => 'DayZ is a survival video game developed and published by Bohemia Interactive. It is the standalone successor of the mod of the same name. Following a five-year long early access period for Windows, the game was officially released in December 2018, and was released for the Xbox One and PlayStation 4 in 2019.',
                'price' => 160,
                'genre' => 'Survival',
                'discount' => 120,
                'tag' => 'Sale',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            3 =>
            array (
                'name' => 'Among Us',
                'image' => 'uploads/4.jpg',
                'description' => 'Among Us is an online multiplayer social deduction game developed and published by American game studio Innersloth and released on June 15, 2018. The game takes place in a space-themed setting, in which players each take on one of two roles, most being Crewmates, and a predetermined number being Impostors.',
                'price' => 25,
                'genre' => 'Social Deduction',
                'discount' => 20,
                'tag' => 'Trending',
                'category_id' => 1,
                'created_at' => Carbon::now()
            ),
            4 =>
            array (
                'name' => "Rainbow Six Siege",
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
                'name' => "Assassin's Creed Valhalla",
                'image' => 'uploads/6.jpg',
                'description' => 'Assassin\'s Creed Valhalla is an action role-playing video game developed by Ubisoft Montreal and published by Ubisoft. It is the twelfth major installment and the twenty-second release in the Assassin\'s Creed series, and a successor to the 2018 game Assassin\'s Creed Odyssey.',
                'price' => 160,
                'genre' => 'Action',
                'discount' => null,
                'tag' => 'HOT',
                'category_id' => 3,
                'created_at' => Carbon::now()
            ),
            6 =>
            array (
                'name' => 'Cyberpunk 2077',
                'image' => 'uploads/7.jpg',
                'description' => 'Cyberpunk 2077 is an upcoming action role-playing video game developed and published by CD Projekt. It is scheduled to be released for Microsoft Windows, PlayStation 4, PlayStation 5, Stadia, Xbox One, and Xbox Series X/S on 10 December 2020.',
                'price' => 210,
                'genre' => 'Action',
                'discount' => 205,
                'tag' => 'New',
                'category_id' => 5,
                'created_at' => Carbon::now()
            ),
            7 =>
            array (
                'name' => 'Watch Dogs 2',
                'image' => 'uploads/8.jpg',
                'description' => 'Watch Dogs 2 is a 2016 action-adventure game developed by Ubisoft Montreal and published by Ubisoft. It is the sequel to 2014\'s Watch Dogs and the second installment in the Watch Dogs series. It was released for the PlayStation 4, Xbox One and Microsoft Windows in November 2016, and Stadia in December 2020.',
                'price' => 30,
                'genre' => 'Action',
                'discount' => null,
                'tag' => 'Trending',
                'category_id' => 5,
                'created_at' => Carbon::now()
            ),
            8 =>
            array (
                'name' => 'The Division 2',
                'image' => 'uploads/9.jpg',
                'description' => 'Tom Clancy\'s The Division 2 is an online action role-playing video game developed by Massive Entertainment and published by Ubisoft.',
                'price' => 50,
                'genre' => 'Action',
                'discount' => 30,
                'tag' => 'Hot',
                'category_id' => 5,
                'created_at' => Carbon::now()
            ),
            9 =>
            array (
                'name' => "Overwatch",
                'image' => 'uploads/10.jpg',
                'description' => 'Overwatch is a team-based multiplayer first-person shooter developed and published by Blizzard Entertainment. Described as a "hero shooter", Overwatch assigns players into two teams of six, with each player selecting from a large roster of characters, known as "heroes", with unique abilities.',
                'price' => 80,
                'genre' => 'Action',
                'discount' => 70,
                'tag' => 'Sale',
                'category_id' => 4,
                'created_at' => Carbon::now()
            ),
            10 =>
            array (
                'name' => "Call of Duty : Modern Warfare",
                'image' => 'uploads/11.jpg',
                'description' => 'Call of Duty: Modern Warfare is a 2019 first-person shooter video game developed by Infinity Ward and published by Activision. Serving as the sixteenth overall installment in the Call of Duty series, as well as a reboot of the Modern Warfare sub-series, it was released on October 25, 2019, for Microsoft Windows, PlayStation 4, and Xbox One.',
                'price' => 220,
                'genre' => 'Action',
                'discount' => 200,
                'tag' => 'Sale',
                'category_id' => 4,
                'created_at' => Carbon::now()
            ),
            11 =>
            array (
                'name' => "World of Warcraft",
                'image' => 'uploads/12.jpg',
                'description' => 'World of Warcraft (WoW) is a massively multiplayer online role-playing game (MMORPG) released in 2004 by Blizzard Entertainment. It is the fourth released game that is set in the Warcraft fantasy universe. World of Warcraft takes place within the Warcraft world of Azeroth, approximately four years after the events at the conclusion of Blizzard\'s previous Warcraft release, Warcraft III: The Frozen Throne.',
                'price' => 60,
                'genre' => 'Action',
                'discount' => null,
                'tag' => 'Sale',
                'category_id' => 4,
                'created_at' => Carbon::now()
            ),

        ));


    }
}
