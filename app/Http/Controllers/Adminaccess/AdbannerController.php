<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Adbanner;

class AdbannerController extends Controller
{
    public function index()
    {
        $banners = Adbanner::latest()->paginate(10);
        return view('admin.adbanner.index', compact('banners'));
    }
    public function create()
    {
        return view('admin.adbanner.create');
    }
    public function store()
    {
        $banner = request()->validate([
            'title' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png',
            'adposition' => 'required',
        ]);
        //Adbanner Image Handler
        $fileNameWithExtension = request()->file('image')->getClientOriginalExtension();
        $fileNameToStore  = Str::slug(request('title')).uniqid(). ".".$fileNameWithExtension;
        $filePath = storage_path('app/public/uploads/adbanner/');
        $fileUploadPath = request()->image->move($filePath, $fileNameToStore);
        Adbanner::create(array_merge($banner, [
            'slug' => Str::slug(request('title')),
            'status' => request('status'),
            'link' => (request('link') === "") ? "#" : request('link'),
            'image' => $fileNameToStore,
        ]));
        return redirect()->route('adbanner.index')->with('message', 'AdBanner Uploaded successfuly');
    }
    public function edit($id)
    {
        $adbanner = AdBanner::findOrFail($id);
        return view('admin.adbanner.edit', compact('adbanner'));
    }
    public function update(Adbanner $adbanner)
    {
        $banner = request()->validate([
            'title' => 'required|string',
            'adposition' => 'required',
         ]);
        //Adbanner Image Handler
        if (request()->has('image')) {
            $fileNameWithExtension = request()->file('image')->getClientOriginalExtension();
            $fileNameToStore  = Str::slug(request('title')).uniqid(). ".".$fileNameWithExtension;
            $filePath = storage_path('app/public/uploads/adbanner/');
            $fileUploadPath = request()->image->move($filePath, $fileNameToStore);
            $adbanner->image = $fileNameToStore;
            $adbanner->save();
        }

        $adbanner->update(array_merge($banner, [
            'slug' => Str::slug(request('title')),
            'status' => request('status'),
            'link' => (request('link') === "") ? "#" : request('link'),
         ]));
        return redirect()->route('adbanner.index')->with('message', 'AdBanner Updated successfuly');
    }
    public function destroy($id)
    {
        $adbanner = Adbanner::findOrFail($id);
        $adbanner->delete();
        return back()->with('message', 'Adbanner deleted successfuly');
    }
}
