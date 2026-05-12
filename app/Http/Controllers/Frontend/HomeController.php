<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)->limit(6)->get();
        $newProducts = Product::where('is_active', true)->latest()->limit(4)->get();
        return view('frontend.home', compact('featuredProducts', 'newProducts'));
    }
}