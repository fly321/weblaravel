<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'uid'=>rand(1,10),
        'title'=>$faker->word,
        'desn'=>$faker->sentence,
        'cnt'=>$faker->text
    ];
});
