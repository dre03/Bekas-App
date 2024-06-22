<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoriController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SellController;
use App\Http\Controllers\User\WistlistController;
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

Route::middleware('isGuest')->group(function() {
    // Route Login Admin
    Route::get('/admin/login', [AuthController::class, 'login'])->name('adminLogin');
    Route::post('/admin/login', [AuthController::class, 'authenticateAdmin'])->name('authAdminlogin');

    //=================================================//

    // Route Login Pelanggan
    Route::get('/', [UserProductController::class, 'index'])->name('home');
    Route::post('/auth-login', [UserAuthController::class, 'authenticateUser'])->name('authUserlogin');
    Route::post('/auth-registrasi', [UserAuthController::class, 'registrasi'])->name('registrasi');

    // route google
    Route::get('/auth/redirect', [UserAuthController::class, 'redirectGoogle'])->name('redirectGoogle');
    Route::get('/google/redirect', [UserAuthController::class, 'googleCallBack'])->name('googleCallBack');

});

Route::middleware('isAdmin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/categorie', [CategorieController::class, 'index'])->name('categorie');
    Route::post('/categorie/create', [CategorieController::class, 'store'])->name('categorie.store');
    Route::put('/categorie/{id}', [CategorieController::class, 'update'])->name('categorie.update');
    Route::delete('/categorie/{id}', [CategorieController::class, 'destroy'])->name('categorie.delete');
    Route::get('/subcategorie', [SubCategoriController::class, 'index'])->name('subcategorie');
    Route::post('/subcategorie/create', [SubCategoriController::class, 'store'])->name('subcategorie.store');
    Route::put('/subcategorie/{id}', [SubCategoriController::class, 'update'])->name('subcategorie.update');
    Route::delete('/subcategorie/{id}', [SubCategoriController::class, 'destroy'])->name('subcategorie.delete');
    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::put('/admin/product/status/{id}', [ProductController::class, 'updateStatus'])->name('product.updateStatus');
    Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/admin/user', [CustomerController::class, 'index'])->name('user');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/user/create', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/profile', [AdminController::class, 'myProfile'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.upProfile');
    Route::put('/admin/profile/update/password', [AdminController::class, 'updatePassword'])->name('admin.upPassword');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('adminLogout')->middleware('onlyPost');
});

Route::middleware('isUser')->group(function(){
    Route::get('/home', [UserProductController::class, 'index'])->name('homepage');
    Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('userLogout');
    Route::get('/sell', [SellController::class, 'categorie'])->name('sell');
    Route::post('/sell/create', [SellController::class, 'store'])->name('sell.store');
    Route::get('/wishlist', [WistlistController::class, 'index'])->name('wistlist');
    Route::delete('/wishlist/{id}', [WistlistController::class, 'destroy'])->name('wistlist.delete');
    Route::post('/wishlist/toggle', [WistlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::get('/product',[UserProductController::class, 'product'])->name('web.product');
    Route::get('/subcategories/{id}', [UserProductController::class, 'getSubcategories'])->name('web.subcategorie');
    Route::get('/product/detail/{id}', [UserProductController::class, 'detail'])->name('web.product.detail');
    Route::delete('/product/{id}', [UserProductController::class, 'destroy'])->name('web.product.destroy');
    Route::get('/profile', [ProfileController::class, 'index'])->name('web.profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('web.profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('web.profile.update');
    Route::get('/user/seller/{id}', [ProfileController::class, 'seller'])->name('web.profile.seller');

});