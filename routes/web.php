<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;

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

Route::get('/', IndexController::class)->name('index');

Auth::routes();


Route::prefix('/cart')->middleware('auth')->group(function (){
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-item', [CartController::class, 'store'])
        ->name('cart.add-item');
    Route::delete('/delete-item', [CartController::class, 'deleteItem'])
        ->name('cart.delete-item');
    Route::delete('/destroy', [CartController::class, 'destroy'])
        ->name('cart.destroy');
});

Route::prefix('/admin')->middleware(['auth', 'is-admin'])->group(function (){
    Route::resource('/products', ProductsController::class);
    Route::resource('/categories',CategoriesController::class);
});
