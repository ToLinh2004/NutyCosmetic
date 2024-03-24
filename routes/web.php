<?php

// use App\Models\Product;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Models\Admin\Categories;

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
Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('Admin.Adminhomepage');
    })->name('Homepage');
    // user
    Route::get('/user', [UserController::class, 'index'] )->name('user');
    Route::get('/editUser/{id}', [UserController::class, 'show'])->name('edituser');
    Route::post('/update',[UserController::class,'update'])->name('updateuser');
    Route::get('/deletes/{id}', [UserController::class, 'destroy'])->name('softdeleteuser');
    // product
    Route::get('/product', [ProductController::class,'index'])->name('products');
    Route::get('/addProduct', [ProductController::class, 'create'])->name('addproduct');
    Route::post('/addProduct', [ProductController::class, 'store'])->name('storeproduct');
    Route::get('/editProduct/{id}', [ProductController::class, 'show'])->name('editproduct');
    Route::post('/update',[ProductController::class,'update'])->name('updateproduct');
    Route::get('/deleted/{id}', [ProductController::class, 'destroy'])->name('deleteproduct');
    // order
    Route::get('/order', [OrderController::class,'index'])->name('orders');
    // category
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
    Route::get('/addcategory', [CategoriesController::class,'create'])->name('addcategory');
    Route::post('/addcategory', [CategoriesController::class, 'store'])->name('storecategories');
    Route::get('/editCategories{id}', [CategoriesController::class, 'show'])->name('editCategories');
    Route::post('/updateCategories',[CategoriesController::class,'update'])->name('updatecategories');
    Route::get('/delete/{id}', [CategoriesController::class, 'destroy'])->name('deletecategory');
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/home',[ProductController::class,'home'])->name('home');
    Route::get('/product',[ProductController::class,'getAllProduct'])->name('all-product');
    Route::get('/product-detail/{id}/{category_id}',[ProductController::class,'productDetail'])->name('product-detail');
    Route::get('/category/{id}',[CategoriesController::class,'getCategoryDetail'])->name('category-detail');
});
