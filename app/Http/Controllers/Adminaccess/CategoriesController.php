<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
 
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
       return view('admin.category.create');
    }

    public function store()
    {
        $data = request()->validate(['name' => 'required|string']);
        Category::create($data);
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
        $cat->update($data);
        return redirect()->route('categories.index')->with('message', 'Category updated successfully');
    }

    public function destroy($category)
    {
        $cat = Category::findOrFail($category);
        $cat->product()->delete();
        $cat->delete();
        return back()->with('message', 'Category deleted successfully');
    }
}
