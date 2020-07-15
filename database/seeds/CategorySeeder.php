<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        $categories = ['men', 'women', 'kids', 'accessories', 'cloth', 'shoes', 'jewellery', 'watches', 'sports', 'health & beauty', 'uncategorized'];
        foreach($categories as $category){
            factory(Category::class)->create([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
