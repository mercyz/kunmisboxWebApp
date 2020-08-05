<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use Illuminate\Support\Str;
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

        if (!empty(request()->previous_amount) && request()->amount > request()->previous_amount) {
            return back()->with('error', 'Previous price must be greater than current price');
        }
        //Featured Image Handler
        $fileNameWithExtension = request()->file('featured_image')->getClientOriginalExtension();
        $fileNameToStore  = Str::slug(request('name')).uniqid(). ".".$fileNameWithExtension;
        $filePath = storage_path('app/public/uploads/products/featured/');
        $fileUploadPath = request()->featured_image->move($filePath, $fileNameToStore);

        //Store Product
        $product = Product::create(array_merge($data, [
            'reference' => Str::random(10),
            'featured_image' => $fileNameToStore,
            'category_id' => request('category'),
            'previous_amount' => request('previous_amount'),
            'slug' => Str::slug(request('name')).'-'.uniqid(),
            'status' => request('status'),
            'instock' => request('instock'),
        ]));

        //Handle Product Images
        if (!empty(request('pro_image'))) {
            $images = request()->file('pro_image');
            foreach ($images as $image) {
                $fileNameWithExtension = $image->getClientOriginalExtension();
                $fileNameToStore  = Str::slug($product->name).'-'.uniqid(). ".".$fileNameWithExtension;
                $filePath = storage_path('app/public/uploads/products/');
                $fileUploadPath = $image->move($filePath, $fileNameToStore);
                //Store Product Images
                $proImage = new ProductImage();
                $proImage->product_id = $product->id;
                $proImage->name = $fileNameToStore;
                $proImage->uploadPath = $fileUploadPath;
                $proImage->save();
            }
        }
        return redirect()->route('products.index')->with(['message' => 'Product added successfully']);
    }

    public function edit($product)
    {
        $categories = Category::all();
        $product = Product::with('category')->where('reference', $product)->firstOrFail();
        $productImages = ProductImage::where('product_id', $product->id)->take(4)->get();
        return view('admin.product.edit', compact('product', 'categories', 'productImages'));
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
        if (request()->has('featured_image')) {
            $fileNameWithExtension = request()->file('featured_image')->getClientOriginalExtension();
            $fileNameToStore  = Str::slug(request('name')).uniqid(). ".".$fileNameWithExtension;
            $filePath = storage_path('app/public/uploads/products/featured/');
            $fileUploadPath = request()->featured_image->move($filePath, $fileNameToStore);
            $product->featured_image = $fileNameToStore;
            $product->save();
        }
        //Handle Product Images
        if (!empty(request('pro_image'))) {
            $images = request()->file('pro_image');
            foreach ($images as $image) {
                $fileNameWithExtension = $image->getClientOriginalExtension();
                $fileNameToStore  = Str::slug($product->name).'-'.uniqid(). ".".$fileNameWithExtension;
                $filePath = storage_path('app/public/uploads/products/');
                $fileUploadPath = $image->move($filePath, $fileNameToStore);
                //Store Product Images
                $proImage = new ProductImage();
                $proImage->product_id = $product->id;
                $proImage->name = $fileNameToStore;
                $proImage->uploadPath = $fileUploadPath;
                $proImage->save();
            }
        }
        $product->update(array_merge($data, [
            'previous_amount' => request('previous_amount'),
            'slug' => Str::slug(request('name')).'-'.uniqid(),
            'status' => request('status'),
            'instock' => request('instock'),
        ]));
        return redirect()->route('products.index')->with('message', 'Product updated successfully');
    }
    public function destroy($product)
    {
        $product = Product::where('reference', $product)->firstOrFail();
        $product->productImage()->delete();
        $product->delete();
        return back()->with('message', 'Product deleted successfully');
    }
    public function productImage($id)//this $id here does nothing really..
    {
        $id = request("id");
        $delImage =  ProductImage::find($id);
        $delImage->delete();
        return response()->json(['message', 'Product Image successfully deleted ']);
    }
}
