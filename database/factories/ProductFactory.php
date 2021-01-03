<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => "product 1",
        'image' => 'uploads/6.jpg',
        'description' => 'published by Ubisoft. It is the twelfth major installment and the twenty-second release in the Assassin\'s Creed series, and a successor to the 2018 game Assassin\'s Creed Odyssey.',
        'price' => 160,
        'genre' => 'Action',
        'discount' => null,
        'tag' => 'HOT',
        'category_id' => 3,
        'created_at' => Carbon::now()
    ];
});
