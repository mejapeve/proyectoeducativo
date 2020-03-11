<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(Models\Element::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->firstName,
        'description'=> $faker->name,
        'url_image'=> $faker->imageUrl(),
        'price'=> $faker->numberBetween(0,2000)

    ];
});
