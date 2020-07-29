<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = ['name', 'product_id', 'uploadPath'];

    public function product()
    {
        return $this->belongsTo(App\Models\Product::class);
    }
}
