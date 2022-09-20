<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LevelController as AdminLevelController;
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/', [CustomerHomeController::class, 'index']);
Route::get('/home', [CustomerHomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [CustomerHomeController::class, 'detail']);

// Route::middleware('auth')->group(function(){
    Route::controller(CustomerCartController::class)->group(function(){
        Route::get('cart', 'index');
        Route::post('cart', 'store');
        Route::get('cart/{id}/edit', 'edit');
        Route::put('cart/{id}', 'update');
        Route::delete('cart/{id}', 'destroy');
        Route::post('checkout', 'store');
    });

    Route::controller(CustomerOrderController::class)->group(function(){
        Route::get('order', 'index');
        Route::get('order', 'cetak_pdf');
        Route::post('order', 'store');
        Route::get('order/{id}/detail', 'detail');
    });
// });

// Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index']);
// Route::post('/pesan/{id}', [App\Http\Controllers\DetailController::class, 'order']);
// Route::post('/checkout', [App\Http\Controllers\DetailController::class, 'checkout']);
// Route::delete('/checkout/{id}', [App\Http\Controllers\DetailController::class, 'delete']);

Route::prefix('home')->group(function(){
    Route::controller(ProfileController::class)->group(function(){
        Route::get('profile', 'index');
        Route::put('update_profile', 'update_profile');
        Route::put('update_password', 'update_password');
    });
});

// Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::controller(AdminHomeController::class)->group(function(){
            Route::get('home', 'index');
            Route::put('update_profile', 'update_profile');
            Route::put('update_password', 'update_password');
        });
        Route::resource('category', AdminCategoryController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('order', AdminOrderController::class);
        Route::get('/export', [AdminOrderController::class, 'export'])->name('export');
        Route::resource('user', AdminUserController::class);
        Route::resource('level', AdminLevelController::class);
    });
// });
