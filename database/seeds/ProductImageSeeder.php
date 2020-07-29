<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::truncate();
        $products = Product::all();
        foreach ($products as $product) {
            factory(ProductImage::class)->create([
                'name' => Str::slug($product->name).Str::random(10),
                'product_id' => $product->id,
            ]);
        }
    }
}
