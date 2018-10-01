<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'fecha' => $faker->date('d-m-Y')
    ];
});
