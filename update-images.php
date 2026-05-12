<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Product;

$images = [
    1 => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?w=300&h=200&fit=crop',
    2 => 'https://images.unsplash.com/photo-1485808191679-5f86510681a2?w=300&h=200&fit=crop',
    3 => 'https://images.unsplash.com/photo-1578314675249-a6910f80cc4e?w=300&h=200&fit=crop',
    4 => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=300&h=200&fit=crop',
    5 => 'https://images.unsplash.com/photo-1534778101976-62847782c213?w=300&h=200&fit=crop',
    6 => 'https://images.unsplash.com/photo-1507133750040-4a8f57021571?w=300&h=200&fit=crop',
    7 => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?w=300&h=200&fit=crop',
    8 => 'https://images.unsplash.com/photo-1593622476449-46b1d5cdfff7?w=300&h=200&fit=crop',
];

foreach ($images as $id => $url) {

    Product::where('id', $id)->update([
        'image' => $url
    ]);

    echo "✓ Updated product ID: $id\n";
}

echo "\nDone!\n";