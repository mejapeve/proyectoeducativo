<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Kit::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->firstName,
        'description'=>$faker->name,
        'url_image'=>$faker->imageUrl()
    ];
});
