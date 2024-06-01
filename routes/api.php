<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\UserController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::prefix('product')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('api.product-list');
    Route::get('{id}', [ProductController::class, 'show'])->name('api.product-show');
});

Route::get('/category', [CategoryController::class, 'index'])->name('api.category-list')->middleware('auth:sanctum');



Route::post('/login', [UserController::class, 'login'])->name('api.login');
Route::post('/register', [UserController::class, 'register'])->name('api.register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('api.logout')->middleware('auth:sanctum');
    Route::get('/user', [UserController::class, 'fetch'])->name('api.user')->middleware('auth:sanctum');
});

