<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Livewire\Category\Delete;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', App\Livewire\HomePage::class)->name('home');

Route::get('/category', App\Livewire\Category::class)->name('category');
Route::post('/category/create', App\Livewire\Category\Create::class)->name('category.create');
Route::get('/detail-product', App\Livewire\DetailProduct::class)->name('detailProduct');

Route::get('/checkout', App\Livewire\Checkout::class)->name('checkout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
});
