<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(20);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
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
            'category_id' => request('category'),
            'previous_amount' => request('previous_amount'),
        ]));
        return redirect()->route('products.index')->with(['message' => 'Product added successfully']);
    }

    public function edit($product)
    {
        $categories = Category::all();
        $product = Product::with('category')->where('reference', $product)->firstOrFail();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function update($product)
    {
        $product = Product::where('reference', $product)->first();
        $data  = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required',
            'category' => 'required',
            'link' => 'required|string',
        ]);
        if(request()->has('featured_image')){
            $fileNameWithExtension = request()->file('featured_image')->getClientOriginalExtension();
            $fileNameToStore  = Str::slug(request('name')).uniqid(). ".".$fileNameWithExtension;
            $filePath = storage_path('app/public/uploads/products/');
            $fileUploadPath = request()->featured_image->move($filePath, $fileNameToStore);
            $product->featured_image = $fileNameToStore;
            $product->save();
        }
        $product->update(array_merge($data, [
            'previous_amount' => request('previous_amount'),
        ]));
        return redirect()->route('products.index')->with('message', 'Product updated successfully');
    }
    public function destroy($product)
    {
        $product = Product::where('reference', $product)->firstOrFail();
        $product->delete();
        return back()->with('message', 'Product deleted successfully');
    }
}
