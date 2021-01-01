<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'uploads/6.jpg',
        'description' => 'Assassin\'s Creed Valhalla is an action role-playing video game developed by Ubisoft Montreal and published by Ubisoft. It is the twelfth major installment and the twenty-second release in the Assassin\'s Creed series, and a successor to the 2018 game Assassin\'s Creed Odyssey.',
        'price' => 160,
        'genre' => 'Action',
        'discount' => null,
        'tag' => 'HOT',
        'category_id' => 3,
        'created_at' => Carbon::now()
    ];
});
