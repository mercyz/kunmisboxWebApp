<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductImage;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'name' => Str::slug($faker->sentence),
        'product_id' => mt_rand(1, 100),
        'uploadPath' => 'uploads/product/images',
    ];
});
