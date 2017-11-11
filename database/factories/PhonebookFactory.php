<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Phonebook::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone_no' => $faker->randomNumber(),
    ];
});