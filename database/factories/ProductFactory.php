<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $reference = Str::random(10);
    $name = $faker->sentence;
    $featuredImage = $faker->randomElement(['blackbag.jpeg', 'blackgown.jpeg', 'blackhillshoe.jpeg', 'bluehandbag.jpeg',
    'bluesneakers.jpeg', 'brownmaleshoe.jpeg', 'dress.jpeg', 'finegown.jpeg', 'grayhillshoe.jpeg', 'handbag.jpeg', 'handpause.jpeg', 'hilshow.jpeg', 'maleshoe.jpeg', 'oxbloodgown.jpeg', 'palms.jpeg', 'redandblackbag.jpeg', 'redhandbagback.jpeg', 'shirt.jpeg', 'slaydress.jpeg', 'top.jpeg', 'whitebag.jpeg' ]);
    return [
        'name' => $name,
        'description' => $faker->paragraph,
        'amount' => mt_rand(1000, 99999),
        'previous_amount' => mt_rand(10000, 9999999),
        'reference' => $reference,
        'category_id' => mt_rand(1, 8),
        'featured_image' => $featuredImage,
        'status' => mt_rand(0, 1),
        'featured' => mt_rand(0, 1),
        'instock' => mt_rand(0, 1),
        'slug' => Str::slug($name).'-'.uniqid(),
        'link' => env('APP_URL').'/product/'.Str::slug($name).'-'.$reference,
    ];
});
