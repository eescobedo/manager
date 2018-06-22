<?php

use App\Document;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'content' => $faker->text,
    ];
});
