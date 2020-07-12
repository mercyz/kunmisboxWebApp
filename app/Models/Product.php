<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'amount', 'previous_amount', 'reference', 'featured_image', 'category_id'];
}
