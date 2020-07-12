<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);
        dd($products);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {

    }
    public function store()
    {
        //Request Validation
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'string',
            'amount' => 'required',
            'category' => 'required',
            'link' => 'required',
            'featured_image' => 'required|mimes:jpg,jpeg,png',
        ]);
        //Image Handler
        $fileNameWithExtension = request()->file('featured_image')->getClientOriginalExtension();
        $fileNameToStore  = Str::slug(request('name')).uniqid(). ".".$fileNameWithExtension;
        $filePath = storage_path('app/public/uploads/products/');
        $fileUploadPath = request()->featured_image->move($filePath, $fileNameToStore);

        //Store Imaege
        Product::create(array_merge($data, [
            'reference' => Str::random(10),
            'featured_image' => $fileNameToStore,
        ]));
        return redirect()->route('products')->with(['message' => 'Product added successfully']);
    }
}
