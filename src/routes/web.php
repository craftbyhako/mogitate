<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductsController;



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

Route::get('/register', [ProductsController::class,'create']);

Route::post('/products', [ProductsController::class, 'store']);

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

Route::get('/products/{productId}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/products/{productId}/update', [ProductsController::class, 'edit'])->name('products.update-form');

Route::patch('/products/{productId}', [ProductsController::class, 'update'])->name('products.update');

Route::delete('/products/{productId}', [ProductsController::class, 'destroy'])->name('products.destroy');

// Route::post('/products/{productId}/update', [ProductsController::class, 'update'])->name('products.update');
