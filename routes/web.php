<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProductsController;

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

Route::get('/', [App\Http\Controllers\ProductsController::class, 'show']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductsController::class, 'index'])->name('home');
Route::get('/shop/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('products');
Route::get("/product/{id}", [App\Http\Controllers\ProductController::class, 'show'])->name('product');
