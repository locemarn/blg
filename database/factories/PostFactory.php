<?php

use Faker\Generator as Faker;

$factory->define(App\Model\user\post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    $subtitle = $faker->sentence(6);
    $filePath = storage_path();
    return [
        'title'=> $title,
        'subtitle'=> $subtitle,
        'slug'=> str_slug($title),
        'body'=> $faker->text(500),
        'posted_by'=> $faker->name,
        'image'=> $faker->image($filePath)
    ];
});
