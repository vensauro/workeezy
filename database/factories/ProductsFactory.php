<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'quantity' => $faker->numberBetween($min = 100, $max = 900),
        'price' => $faker->numberBetween($min = 100, $max = 900),
    ];
});
