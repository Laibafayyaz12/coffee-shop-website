<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Espresso',
                'slug' => 'classic-espresso',
                'description' => 'Rich and bold single-origin espresso shot with crema topping. Perfect for those who love strong coffee.',
                'price' => 250,
                'sale_price' => null,
                'category' => 'Espresso',
                'stock' => 50,
                'is_active' => true
            ],
            [
                'name' => 'Caramel Latte',
                'slug' => 'caramel-latte',
                'description' => 'Smooth espresso latte with sweet caramel syrup, topped with whipped cream.',
                'price' => 450,
                'sale_price' => 399,
                'category' => 'Latte',
                'stock' => 40,
                'is_active' => true
            ],
            [
                'name' => 'Mocha Frappe',
                'slug' => 'mocha-frappe',
                'description' => 'Chilled coffee blended with chocolate, ice, and topped with whipped cream.',
                'price' => 550,
                'sale_price' => null,
                'category' => 'Cold Coffee',
                'stock' => 35,
                'is_active' => true
            ],
            [
                'name' => 'Vanilla Cold Brew',
                'slug' => 'vanilla-cold-brew',
                'description' => 'Smooth cold brew coffee steeped for 12 hours with natural vanilla essence.',
                'price' => 500,
                'sale_price' => 450,
                'category' => 'Cold Brew',
                'stock' => 30,
                'is_active' => true
            ],
            [
                'name' => 'Hazelnut Cappuccino',
                'slug' => 'hazelnut-cappuccino',
                'description' => 'Creamy cappuccino with hazelnut flavor and cinnamon dusting.',
                'price' => 480,
                'sale_price' => null,
                'category' => 'Cappuccino',
                'stock' => 45,
                'is_active' => true
            ],
            [
                'name' => 'Turkish Coffee',
                'slug' => 'turkish-coffee',
                'description' => 'Traditional Turkish coffee, finely ground and brewed to perfection.',
                'price' => 300,
                'sale_price' => 280,
                'category' => 'Traditional',
                'stock' => 25,
                'is_active' => true
            ],
            [
                'name' => 'Iced Americano',
                'slug' => 'iced-americano',
                'description' => 'Refreshing iced Americano with a double shot of espresso.',
                'price' => 350,
                'sale_price' => null,
                'category' => 'Iced Coffee',
                'stock' => 60,
                'is_active' => true
            ],
            [
                'name' => 'White Chocolate Mocha',
                'slug' => 'white-chocolate-mocha',
                'description' => 'Sweet white chocolate combined with rich espresso and steamed milk.',
                'price' => 520,
                'sale_price' => 480,
                'category' => 'Mocha',
                'stock' => 38,
                'is_active' => true
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}