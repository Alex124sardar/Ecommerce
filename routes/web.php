<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index'])->name('index');
// cart
// Route::post('/add_cart/{id}',[FrontendController::class,'add_cart'])->name('add_cart');
Route::post('/add-to-cart',[CartController::class,'addToCart']);

Auth::routes();
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('admin.index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart-index', [FrontendController::class, 'cart'])->name('index.cart');
Route::get('/checkout-index', [FrontendController::class, 'checkout'])->name('index.checkout');

// category
Route::get('/category-index',[CategoryController::class,'index'])->name('index.category');
Route::post('/category-store', [CategoryController::class, 'store'])->name('store.category');
Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/category-update/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('delete.category');


// product
Route::get('/product-index', [ProductController::class, 'index'])->name('index.product');
Route::post('/product-store', [ProductController::class, 'store'])->name('store.product');
Route::get('/product-edit/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::post('/product-update/{id}', [ProductController::class, 'update'])->name('update.product');
Route::get('/product-delete/{id}', [ProductController::class, 'destroy'])->name('delete.product');

