<?php

namespace App\Http\Controllers\Frontend ;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $men_women = Product::where('status', 1)->wherehas('category', function ($query) use ($categories) {
            $query->where('name', 'women')->orWhere('name', 'men');
        })->get();
        $products = Product::latest()->get();
        $featuredProducts = Product::where('featured', 1)->get();
        return view('frontend.index', compact('men_women', 'products', 'featuredProducts'));
    }
}
