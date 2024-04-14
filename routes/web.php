<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\User\CategoriesController as UserCategoriesController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\DashboardUserController as UserDashboardUserController;
use App\Http\Controllers\User\wishlistController;
use App\Http\Controllers\User\BannerController;
use App\Http\Controllers\User\ContactController as UserContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
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
Route::get('/', [UserProductController::class, 'home'])->name('home');
Route::get('/registerUser', [UserLoginController::class, 'create'])->name('registerUser');
Route::post('/registerUser', [UserLoginController::class, 'store'])->name('storeUser');
Route::get('/loginUser', [UserLoginController::class, 'showLogin'])->name('login');
Route::post('/loginUser', [UserLoginController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [UserLoginController::class, 'destroy'])->name('logout');
Route::get('/dashboard_user', [UserDashboardUserController::class, 'index'])->name('dashboard.user');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('Admin.Adminhomepage');
    })->name('Homepage');
    // user
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [AdminUserController::class, 'show'])->name('edit');
        Route::post('/update', [AdminUserController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminUserController::class, 'destroy'])->name('delete');
    });
    //product
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->name('index');
        Route::get('/add', [AdminProductController::class, 'create'])->name('add');
        Route::post('/store', [AdminProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminProductController::class, 'show'])->name('edit');
        Route::post('/update', [AdminProductController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminProductController::class, 'destroy'])->name('delete');
    });
    // category
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [AdminCategoriesController::class, 'index'])->name('index');
        Route::get('/add', [AdminCategoriesController::class, 'create'])->name('add');
        Route::post('/store', [AdminCategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminCategoriesController::class, 'show'])->name('edit');
        Route::post('/update', [AdminCategoriesController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminCategoriesController::class, 'destroy'])->name('delete');
    });
    // order
    Route::prefix('/order') ->name('order.')->group(function(){
        Route::get('/', [AdminOrderController::class,'index'])->name('index');
        Route::post('/update',[AdminOrderController::class,'update'])->name('update');
    });
    // contact
    Route::get('/contact',[AdminContactController::class,'show'])->name('contact');
    Route::put('/contact/{id}',[AdminContactController::class,'updateStatus'])->name('updateStatus');
    // banner
    Route::prefix('/banners')->name('banners.')->group(function(){
        Route::get('/',[BannerController::class,'index'])->name('index');
        Route::get('/add', [BannerController::class, 'create'])->name('add');
        Route::post('/store', [BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BannerController::class, 'show'])->name('edit');
        Route::post('/update', [BannerController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('delete');
    });
});
Route::prefix('/user')->name('user.')->group(function () {
    Route::get('/home', [UserProductController::class, 'home'])->name('home');
    Route::get('/product', [UserProductController::class, 'getAllProduct'])->name('all-product');
    Route::get('/product-detail/{id}/{category_id}', [UserProductController::class, 'productDetail'])->name('product-detail');
    Route::get('/category/{id}', [UserCategoriesController::class, 'getCategoryDetail'])->name('category-detail');
    Route::get('/add-to-cart/{id}', [UserProductController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/show-cart', [UserProductController::class, 'showCart'])->name('show-cart');
    Route::delete('/delete-cart/{id}', [UserProductController::class, 'deleteCart'])->name('delete-cart');
    Route::get('/contact-us',[UserContactController::class,'index'])->name('contact-us');
    Route::post('/contact-us',[UserContactController::class,'postContact'])->name('post-contact-us');
    Route::get('/wishlist_all', [wishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist', [wishlistController::class, 'wishlistAdd'])->name('wishlist.add');
    Route::delete('wishlist/remove-product/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('/checkout',[UserProductController::class, 'checkout'])->name('checkout');
});
