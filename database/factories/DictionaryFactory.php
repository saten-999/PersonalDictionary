<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dictionary;
use Faker\Generator as Faker;

$factory->define(Dictionary::class, function (Faker $faker) {
    return [
        'armenian' => $faker->name,
        'english' => $faker->name,
        'user_id' => factory(App\User::class)
         
    ];
});
