<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Livewire\Categories;
use App\Livewire\CategorySlug;
use App\Livewire\Checkout;
use App\Livewire\HomePage;
use App\Livewire\ProductDetail;
use App\Livewire\Success;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomePage::class)->name('home');
Route::get('/category', Categories::class)->name('category')->lazy();
Route::get('/category/{slug}', CategorySlug::class)->name('category.slug');
Route::get('/product/{slug}', ProductDetail::class)->name('productDetail');
Route::get('/checkout/{slug}', Checkout::class)->name('checkout')->middleware('auth');

Route::get('/success', Success::class)->name('checkout-success');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/products', [ProductController::class, 'index'])->name('product');
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
});
