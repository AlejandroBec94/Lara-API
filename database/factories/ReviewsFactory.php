<?php

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(App\Model\Reviews::class, function (Faker $faker) {
    return [
        'product_id' => function(){
            return Product::all()->random();
        },
        'custumer' => $faker->name,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
    ];
});
