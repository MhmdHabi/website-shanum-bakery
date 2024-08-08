<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('category', 'favorite')->get();
        return view('dashboard', compact('products'));
    }

    public function about()
    {
        return view('dashboard.about');
    }
    public function maps()
    {
        return view('dashboard.maps');
    }
}
