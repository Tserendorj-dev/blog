<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'cat_name' => $faker->cat_name, 
        'is_visible' => $faker->is_visible, 
        'lang' => $faker->lang,
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title, 
        'pic_path' => $faker->pic_path, 
        'desc_text' => $faker->desc_text,
        'full_text' => $faker->full_text,
        'is_visible' => $faker->is_visible,
        'views' => $faker->views,
        'comments' => $faker->comments,
        'lang' => $faker->lang,
    ];
});