<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->sentence($nbWords = 6, $variableNbWords = true), 
        'is_visible' => $faker->numberBetween($min = 0, $max = 1),
        'lang' => 'mn',
    ];
});