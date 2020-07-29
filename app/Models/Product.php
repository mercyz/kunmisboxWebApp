<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'previous_amount',
        'reference',
        'featured_image',
        'category_id',
        'link',
        'status',
        'featured',
        'instock',
        'slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function productImage()
    {
        return $this->hasMany('App\Models\ProductImage', 'product_id');
    }
}
