<?php

namespace App\Http\Controllers\Frontend ;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
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
            $query->where('name', 'women')->orWhere('name', 'men')->orWhere('name', 'kids');
        })->take(15)->get();
        $products = Product::where('status', 1)->latest()->take(7)->get();
        $featuredProducts = Product::where(['status' => 1, 'featured' => 1])->take(7)->get();
        $productRecommended = Product::where('status', 1)->take(20)->get();
        return view('frontend.index', compact('men_women', 'products', 'featuredProducts', 'productRecommended'));
    }
    public function productDetail($product)
    {
        $product = Product::where('reference', $product)->firstOrFail();
        $relatedProducts = Product::wherehas('category', function ($query) use ($product) {
            $query->where('name', 'LIKE', '%'.$product->category->name.'%')->where('status', 1);
        })->orWhere('name', 'LIKE', '%' .$product->name. "%")->where('status', 1)->take(15)->get();
        return view('frontend.product_detail', compact('product', 'relatedProducts'));
    }
    public function shop()
    {
        $products = Product::where('status', 1)->paginate(20);
        return view('frontend.shop', compact('products'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}
