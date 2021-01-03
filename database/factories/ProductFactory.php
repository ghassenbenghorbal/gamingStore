<?php

use Faker\Generator as Faker;
use Carbon\Carbon;
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'uploads/6.jpg',
        'description' => 'aa',
        'price' => 160,
        'genre' => 'Action',
        'discount' => null,
        'tag' => 'HOT',
        'category_id' => 1,
        'created_at' => Carbon::now()
    ];
});
