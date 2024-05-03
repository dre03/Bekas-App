<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function() {
    Route::get('/admin-registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/admin-registrasi', [AuthController::class, 'store'])->name('auth.store');
    Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin-login', [AuthController::class, 'authenticate'])->name('auth.login');
});


Route::middleware('auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie');
    Route::post('/categorie/create', [CategorieController::class, 'store'])->name('categorie.store');
    Route::put('/categorie/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('categorie.delete');
    Route::get('product', [ProductController::class, 'index'])->name('product');
    Route::put('/product/status/{id}', [ProductController::class, 'updateStatus'])->name('product.updateStatus');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::get('profile', [UserController::class, 'index'])->name('profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
