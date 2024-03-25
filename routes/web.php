<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\FE\LoginController;
use App\Http\Controllers\FE\DashboardUserController;
use App\Http\Controllers\LoginController as ControllersLoginController;

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
Route::get('/registerUser',[LoginController::class, 'create'])->name('registerUser');
Route::post('/registerUser', [LoginController::class, 'store'])->name('storeUser');
Route::get('/loginUser',[LoginController::class, 'showLogin'])->name('login');
Route::post('/loginUser',[LoginController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/dashboard_user', [DashboardUserController::class, 'index'])->name('dashboard.user');

Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('Admin.Adminhomepage');
    })->name('Homepage');
    // user
    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UserController::class, 'show'])->name('edit');
        Route::post('/update',[UserController::class,'update'])->name('update');
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
    //product
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/add', [ProductController::class, 'create'])->name('add');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'show'])->name('edit');
        Route::post('/update',[ProductController::class,'update'])->name('update');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    });
    // category
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('index');
        Route::get('/add', [CategoriesController::class, 'create'])->name('add');
        Route::post('/store', [CategoriesController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoriesController::class, 'show'])->name('edit');
        Route::post('/update',[CategoriesController::class,'update'])->name('update');
        Route::get('/delete/{id}', [CategoriesController::class, 'destroy'])->name('delete');
    });
    // order
    Route::get('/order', [OrderController::class,'index'])->name('orders');
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/home',[ProductController::class,'home'])->name('home');
    Route::get('/product',[ProductController::class,'getAllProduct'])->name('all-product');
    Route::get('/product-detail/{id}/{category_id}',[ProductController::class,'productDetail'])->name('product-detail');
    Route::get('/category/{id}',[CategoriesController::class,'getCategoryDetail'])->name('category-detail');
});
