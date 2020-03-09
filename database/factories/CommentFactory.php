<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Comment;
use App\User;
use App\Post;
use App\Rate;

$factory->define(Comment::class, function (Faker $faker) {
    $users = User::pluck('id')->all();
    $posts = Post::pluck('post_id')->all();
    $rates = Rate::pluck('rate_id')->all();

    return [
        'parent_id' => '0',
        'post_id' => $faker->randomElement($posts),
        'user_id' => $faker->randomElement($users),
        'rate_id' => $faker->randomElement($rates),
        'comment_text' => $faker->sentence($nbWords = 6, $variableNbWords = true), 
        'is_visible' => $faker->numberBetween($min = 0, $max = 1),
        'lang' => 'mn',
    ];
});
