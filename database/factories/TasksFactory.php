<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'difficulty' => $faker->numberBetween($min = 0, $max = 5),
        'status' => $faker->numberBetween($min = 0, $max = 3),
        'user_id' => $faker->numberBetween($min = 1, $max = 11),
        'deadline' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
    ];
});

// php artisan tinker
// factory(App\User::class, 10) \
//      ->create() \
//      ->each(function($user) { \
//          $user->tasks()->save(factory(App\Task::class)->make()); \
//      });
