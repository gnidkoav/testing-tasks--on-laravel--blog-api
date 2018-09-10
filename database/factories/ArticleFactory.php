<?php

use Faker\Generator as Faker;


$factory->define(App\Article::class, function (Faker $faker) {
    return [

        'author_id' => 1, // root@admin.usr
        'title'     => $faker->text(10),
        'content'   => $faker->text(90),
    ];
});

