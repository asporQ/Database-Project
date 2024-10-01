<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DiscountController;


Route::resource('orders', OrderController::class);

// Product
Route::get('/products', [ProductController::class, 'index']);

Route::middleware('admin')->group(function () {
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/manage', [ProductController::class, 'manageProducts'])->name('products.manage');
    Route::get('/products/{id}/stock', [ProductController::class, 'showUpdateStockForm'])->name('products.showUpdateStockForm');
    Route::patch('/products/{id}/stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
    Route::get('/products/{id}/price', [ProductController::class, 'showUpdatePriceForm'])->name('products.showUpdatePriceForm');
    Route::patch('/products/{id}/price', [ProductController::class, 'updatePrice'])->name('products.updatePrice');
});


// Discount
Route::middleware('admin')->group(function () {
    Route::get('/discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
    Route::post('/discounts', [DiscountController::class, 'store'])->name('discounts.store');
    Route::post('/products/update-discount', [ProductController::class, 'updateDiscount'])->name('products.updateDiscount');
});

// order



Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest-content', function () {
    return view('guest');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/place-order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');

    // Order
    Route::post('orders/{order}/make-payment', [OrderController::class, 'makePayment'])->name('orders.makePayment');
    Route::get('orders/{order}/transcript', [OrderController::class, 'viewTranscript'])->name('orders.viewTranscript');

});


require __DIR__ . '/auth.php';