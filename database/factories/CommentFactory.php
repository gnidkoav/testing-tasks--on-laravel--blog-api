<?php

use Faker\Generator as Faker;


$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'article_id'   => rand(1, 25),
        'author_id'    => rand(1, 50),
        'comment_text' => $faker->text(50),
    ];
});

