<?php

use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Admin\Category\Index as CategoryIndex;
use App\Livewire\Pages\Admin\DashboardAdmin;
use App\Livewire\Pages\Admin\Product\Index as ProductsIndex;
use App\Livewire\Pages\Admin\User\Index as UserIndex;
use App\Livewire\Pages\Admin\RolePermissions\Index as RolePermissions;
use App\Livewire\Pages\Admin\Roles\Index as Roles;

use App\Livewire\Pages\Admin\Permission\Index as Permissions;
use App\Livewire\Pages\Admin\Transaction\TransactionEdit;
use App\Livewire\Pages\Admin\Transaction\TransactionList;
use App\Livewire\Pages\Admin\Transaction\TransactionReview;
use App\Livewire\Pages\Admin\UserProfile;
use App\Livewire\Pages\Cart;
use App\Livewire\Pages\Categories;
use App\Livewire\Pages\CategoriesSlug;
use App\Livewire\Pages\Checkout;
use App\Livewire\Pages\DashboardUser\HistoryTransaction;
use App\Livewire\Pages\DashboardUser\TransactionReview as TransactionReviewUser;
use App\Livewire\Pages\DashboardUser\UserProfileGuest;
use App\Livewire\Pages\HomePage;
use App\Livewire\Pages\ProductDetail;
use App\Livewire\Pages\Success;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');


// role_or_permission:Administrator
Route::prefix('Admin')->middleware(['auth', 'role_or_permission:Administrator'])
    ->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', DashboardAdmin::class)->name('dashboard');

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
       
        Route::get('/', CategoryIndex::class)->name('index');
        
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function(){
        Route::get('/', ProductsIndex::class)->name('index');
    });

    Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
        Route::get('/', UserIndex::class)->name('index');
    });

    Route::group(['prefix' => 'rolePermissions', 'as' => 'rolePermissions.'], function(){
        Route::get('/', RolePermissions::class)->name('index');
    });

    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function(){
        Route::get('/', Roles::class)->name('index');
    });

    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function(){
        Route::get('/', Permissions::class)->name('index');
    });

    Route::get('/transactions', TransactionList::class)->name('transaction.index');
    Route::get('/transaction/{id}', TransactionEdit::class)->name('transaction.edit');
    Route::get('/transaction/{id}', TransactionReview::class)->name('transaction.review');
 

    Route::get('/user/profile', UserProfile::class)->name('user.profile');
    
});

Route::prefix('dashboard')->middleware('auth')
    ->group(function () {
    
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard-guest');

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function(){
        Route::get('', HistoryTransaction::class)->name('user');
        Route::get('/review', TransactionReviewUser::class)->name('review-user');
    });

    Route::get('/user/profile', UserProfileGuest::class)->name('user.profile-guest');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard-guest');
// });



Route::get('/', HomePage::class)->name('home');
Route::get('/categories', Categories::class)->name('categories');
Route::get('/categories/{slug}', CategoriesSlug::class)->name('category.slug');
Route::get('/product/{slug}', ProductDetail::class)->name('product.detail');

Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout/{slug}', Checkout::class)->name('checkout');
Route::post('/midtrans/notification', [MidtransController::class, 'notificationHandler'])->name('midtrans.notification');
Route::get('/success', Success::class)->name('success');
// Route::group(function () {
// });


