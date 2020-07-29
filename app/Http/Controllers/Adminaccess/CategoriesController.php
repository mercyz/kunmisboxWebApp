<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store()
    {
        $data = request()->validate(['name' => 'required|string']);
        Category::create(array_merge($data, ['slug' => Str::slug(request('name'))]));
        return redirect()->route('categories.index')->with('message', 'New category saved!');
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('admin.category.edit', compact('category'));
    }

    public function update($category)
    {
        $data = request()->validate(['name' => 'required|string']);
        $cat = Category::findOrFail($category);
        $cat->update(array_merge($data, ['slug' => Str::slug(request('name'))]));
        return redirect()->route('categories.index')
        ->with('message', 'Category updated successfully');
    }

    public function destroy($category)
    {
        $cat = Category::findOrFail($category);
        $cat->product()->delete();
        $cat->delete();
        return back()->with('message', 'Category deleted successfully');
    }
}
