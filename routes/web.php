<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.detail');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/products-data', [DashboardController::class, 'getProductsData'])->name('products.data');
    Route::post('/products', [DashboardController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [DashboardController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [DashboardController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [DashboardController::class, 'destroy'])->name('products.destroy');
    
    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/orders-data', [DashboardController::class, 'getOrdersData'])->name('orders.data');
    Route::post('/update-order-status', [DashboardController::class, 'updateOrderStatus'])->name('update-order-status');
    Route::get('/order-items/{id}', [DashboardController::class, 'orderItems'])->name('order-items');
    Route::get('/contacts', [DashboardController::class, 'contacts'])->name('contacts');
    Route::get('/contacts-data', [DashboardController::class, 'getContactsData'])->name('contacts.data');
    Route::post('/reply-contact', [DashboardController::class, 'replyContact'])->name('reply-contact');
    Route::get('/customers', [DashboardController::class, 'customers'])->name('customers');
    Route::get('/customers-data', [DashboardController::class, 'getCustomersData'])->name('customers.data');
});

Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test-images-simple', function() {
    $products = App\Models\Product::whereBetween('id', [1,8])->get();
    echo "<h1>Product Images Test</h1>";
    echo "<div style='display: flex; flex-wrap: wrap;'>";
    foreach($products as $p) {
        echo "<div style='margin: 10px; padding: 10px; border: 1px solid #ccc; width: 200px; text-align: center;'>";
        echo "<h3>{$p->name}</h3>";
        if($p->image) {
            echo "<img src='{$p->image}' width='180' height='150' style='object-fit: cover;'><br>";
            echo "<small style='color: green;'>Image URL: " . substr($p->image, 0, 40) . "...</small>";
        } else {
            echo "<div style='background: #eee; padding: 50px;'>NO IMAGE</div>";
        }
        echo "</div>";
    }
    echo "</div>";
});