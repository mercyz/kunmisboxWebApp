<?php

namespace App\Http\Controllers\Adminaccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
}
