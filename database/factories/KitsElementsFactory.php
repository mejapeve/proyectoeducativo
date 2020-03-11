<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\KitElement::class, function (Faker $faker) {
    return [
        //
        'kit_id'=>$faker->numberBetween(1,3),
        'element_id'=>$faker->numberBetween(1,50),
    ];
});
