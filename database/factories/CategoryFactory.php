<?php

use Faker\Generator as Faker;

$factory->define(App\Model\user\category::class, function (Faker $faker) {
    $title = $faker->sentence(2);
    return [
        'name'=> $title,
        'slug'=> str_slug($title)
    ];
});
