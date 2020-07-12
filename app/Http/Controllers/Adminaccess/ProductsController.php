<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {

    }
    public function create()
    {

    }
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'string',
            'amount' => 'required',
            'category' => 'required',
        ]);
    }
}
