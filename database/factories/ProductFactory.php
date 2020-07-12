<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'description' => $faker->paragraph,
        'amount' => mt_rand(1000, 99999),
        'previous_amount' => mt_rand(10000, 9999999),
        'reference' => Str::random(10),
        'category_id' => mt_rand(1, 8),
        'featured_image' => 'productImage.png',
    ];
});
