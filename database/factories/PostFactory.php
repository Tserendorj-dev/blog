<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Post;
use App\User;
use App\Category;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::pluck('id')->all();
    $categories = Category::pluck('cat_id')->all();
    return [
        'cat_id' => $faker->randomElement($categories),
        'user_id' => $faker->randomElement($users),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true), 
        'pic_path' => $faker->image($dir = '/tmp', $width = 640, $height = 480),
        'desc_text' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'full_text' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true), 
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'is_visible' => $faker->numberBetween($min = 0, $max = 1),
        'views' => $faker->numberBetween($min = 1, $max = 100),
        'lang' => 'mn',
    ];
});
