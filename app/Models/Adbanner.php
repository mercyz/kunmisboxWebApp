<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adbanner extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'adposition', 'link', 'status'];
}
