<?php
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CategoriesController;
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
    Route::get('/user', [UserController::class, 'index'] )->name('user');
    Route::get('/addUser', [UserController::class, 'create'])->name('adduser');
    Route::post('/addUser', [UserController::class, 'store'])->name('storeuser');
    Route::get('/editUser/{id}', [UserController::class, 'show'])->name('edituser');
    Route::post('/update',[UserController::class,'update'])->name('updateuser');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('softdeleteuser');
    Route::get('/product', [ProductController::class,'index'])->name('products');
    Route::get('/addproduct', [ProductController::class,'create'])->name('addproduct');
    Route::get('/order', [OrderController::class,'index'])->name('orders');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
});