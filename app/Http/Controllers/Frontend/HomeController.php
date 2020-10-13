<?php

namespace App\Http\Controllers\Frontend ;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Adbanner;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $men_women = Product::with('productImage')->where('status', 1)
            ->wherehas('category', function ($query) use ($categories) {
                $query->wherein('name', ['women', 'men', 'kids']);
            })->take(15)->latest()->get();

        $products = Product::with('productImage')->where('status', 1)->latest()->take(7)->get();

        $featuredProducts = Product::with('productImage')
            ->where(['status' => 1, 'featured' => 1])->take(7)->get();

        $productRecommended = Product::with('productImage')->where('status', 1)->take(20)->get();

        //Banners
        $firstBanners = Adbanner::where(['adposition' => 'first', 'status' => 1])
        ->latest()->take(3)->get();
        $secondBanners = Adbanner::where(['adposition' => 'second', 'status' => 1])
        ->latest()->take(2)->get();
        $thirdBanners = Adbanner::where(['adposition' => 'third', 'status' => 1])
        ->latest()->take(1)->get();

        return view('frontend.index', compact('men_women', 'products', 'featuredProducts', 'productRecommended', 'firstBanners', 'secondBanners', 'thirdBanners'));
    }
    public function productDetail($product)
    {
        $product = Product::with('productImage')->where('slug', $product)->firstOrFail();
        $relatedProducts = Product::with('productImage')->wherehas('category', function ($query) use ($product) {
            $query->where('name', 'LIKE', '%'.$product->category->name.'%')->where('status', 1);
        })->orWhere('name', 'LIKE', '%' .$product->name. "%")->where('status', 1)->take(15)->get();
        $productImages = ProductImage::where('product_id', $product->id)->take(4)->latest()->get();
        return view('frontend.product_detail', compact('product', 'relatedProducts', 'productImages'));
    }
    public function shop()
    {
        $categories = Category::all();
        $products = Product::with('productImage')->where('status', 1)->latest()->paginate(21);
        return view('frontend.shop', compact('products', 'categories'));
    }
    public function search_by_category($category)
    {
        $categories = Category::all();
        $cat = Category::where('slug', $category)->firstOrFail();
        $products = Product::with('productImage')->where('category_id', $cat->id)
        ->latest()->paginate(21);
        return view('frontend.cat_search', compact('products', 'cat', 'categories'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function search()
    {
        $query = request()->search;
        $categories = Category::all();
        $products = Product::with('productImage')->where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('description', 'LIKE', '%'.$query.'%')->where('status', 1)->paginate(20);
        return view('frontend.search', compact('products', 'categories'));
    }
}
