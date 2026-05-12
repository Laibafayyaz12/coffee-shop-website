<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function __construct()
    {
        // Home page ke liye login required nahi
        // $this->middleware('auth');
    }

    public function index()
    {
        // Featured products
        $featuredProducts = Product::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Agar koi product nahi hai toh demo products
        if($featuredProducts->isEmpty()) {
            $featuredProducts = $this->getDemoProducts();
        }
        
        return view('home', compact('featuredProducts'));
    }
    
    private function getDemoProducts()
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'Classic Espresso',
                'description' => 'Rich and bold single-origin espresso shot with crema topping.',
                'price' => 250,
                'sale_price' => null,
                'category' => 'Espresso',
                'image' => 'espresso.jpg'  // images folder ka naam
            ],
            (object)[
                'id' => 2,
                'name' => 'Caramel Latte',
                'description' => 'Smooth espresso latte with sweet caramel syrup.',
                'price' => 459.99,
                'sale_price' => 399,
                'category' => 'Latte',
                'image' => 'caramel-latte.jpg'
            ],
            (object)[
                'id' => 3,
                'name' => 'Mocha Frappe',
                'description' => 'Chilled coffee blended with chocolate and ice.',
                'price' => 550,
                'sale_price' => null,
                'category' => 'Cold Coffee',
                'image' => 'mocha-frappe.jpg'
            ],
            (object)[
                'id' => 4,
                'name' => 'Vanilla Cold Brew',
                'description' => 'Smooth cold brew with vanilla essence.',
                'price' => 500,
                'sale_price' => 450,
                'category' => 'Cold Brew',
                'image' => 'vanilla-cold-brew.jpg'
            ],
            (object)[
                'id' => 5,
                'name' => 'Hazelnut Cappuccino',
                'description' => 'Creamy cappuccino with hazelnut flavor.',
                'price' => 480,
                'sale_price' => null,
                'category' => 'Cappuccino',
                'image' => 'hazelnut-cappuccino.jpg'
            ],
            (object)[
                'id' => 6,
                'name' => 'Turkish Coffee',
                'description' => 'Traditional Turkish coffee.',
                'price' => 300,
                'sale_price' => 280,
                'category' => 'Traditional',
                'image' => 'turkish-coffee.jpg'
            ],
        ]);
    }
}