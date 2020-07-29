<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Adbanner;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Adbanner::class, function (Faker $faker) {
    $name = $faker->sentence;
    return [
        'title' => $name,
        'slug' => Str::slug($name),
        'adposition' => $faker->randomElement(['first', 'second', 'third']),
        'status' => mt_rand(0, 1),
        'image' => 'placeholder.png',
        'link' => '#',
    ];
});
