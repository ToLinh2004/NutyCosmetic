<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[ProductController::class,'index'])->name('home');

Route::get('/product',[ProductController::class,'getAllProduct'])->name('all-product');
Route::get('/product-face',[ProductController::class,'productFace'])->name('product-face');
Route::get('/product-hair',[ProductController::class,'productHair'])->name('product-hair');