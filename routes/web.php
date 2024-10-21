<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/', [ProductController::class, 'showProducts'])->name('products');

    Route::get('/product/create', [ProductController::class, 'showCreateProductForm'])->name('product.create.form');
    Route::post('/product/create', [ProductController::class, 'createProduct'])->name('product.create');

    Route::group(['middleware'=>'admin'], function() {
        Route::get('/register', [RegisterController::class, 'showRegisterPage'])->name('register.page');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
    });
    Route::group(['middleware'=>'permit.product'], function(){
        Route::get('/product/{id}', [ProductController::class, 'showProduct'])->name('product.info');
        Route::post('/product/{id}', [ProductController::class, 'editProduct'])->name('product.edit');

        Route::get('/product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    });

    Route::get('logout', LogoutController::class)->name('logout');
});
