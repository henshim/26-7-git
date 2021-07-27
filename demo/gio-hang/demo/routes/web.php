<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('product.list');

Route::prefix('product')->group(function (){
    Route::get('add', [App\Http\Controllers\ProductController::class, 'add'])->name('product.add');

    Route::post('store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

    Route::get('update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

    Route::post('edit', [App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');

    Route::get('cart/{id}', [App\Http\Controllers\ProductController::class,'cart'])->name('product.cart');
});
