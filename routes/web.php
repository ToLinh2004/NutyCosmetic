<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\FE\LoginUserController;
use App\Http\Controllers\FE\DashboardUserController;
use App\Http\Controllers\FE\HomeController;
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
Route::get('/', [ProductController::class,'home'])->name('home');


Route::get('/login', [LoginUserController::class, 'index'])->name('login.index');
Route::post('/dang_nhap', [LoginUserController::class, 'login'])->name('login.user');
Route::get('/dang_ky', [LoginUserController::class, 'register'])->name('register.user');

Route::post('/store', [LoginUserController::class, 'store'])->name('register.store');

Route::get('/logout', [LoginUserController::class, 'logout'])->name('login.userout');

Route::get('/dashboard_user', [DashboardUserController::class, 'index'])->name('dashboard.user');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('Admin.Adminhomepage');
    })->name('Homepage');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/addUser', [UserController::class, 'create'])->name('adduser');
    Route::post('/addUser', [UserController::class, 'store'])->name('storeuser');
    Route::get('/editUser/{id}', [UserController::class, 'show'])->name('edituser');
    Route::post('/update', [UserController::class, 'update'])->name('updateuser');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('softdeleteuser');
    Route::get('/product', [ProductController::class, 'index'])->name('products');
    Route::get('/order', [OrderController::class, 'index'])->name('orders');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/home',[ProductController::class,'home'])->name('home');
    Route::get('/product',[ProductController::class,'getAllProduct'])->name('all-product');
    Route::get('/product-detail/{id}/{category_id}',[ProductController::class,'productDetail'])->name('product-detail');
    Route::get('/category/{id}',[CategoriesController::class,'getCategoryDetail'])->name('category-detail');
});
