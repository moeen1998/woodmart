<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welocome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\PagesController::class, 'profile'])->name('profile');
Route::get('/product-of-category-num-/{category}', [App\Http\Controllers\PagesController::class, 'categoryproducts'])->name('category.products');
Route::get('/product-details/{product}', [App\Http\Controllers\PagesController::class, 'productdetails'])->name('product.details');

Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}',[App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('/remove-from-cart/{id}',[App\Http\Controllers\ProductController::class, 'remove'])->name('remove.from.cart');

Route::get('/wish', [App\Http\Controllers\WishListController::class, 'wish'])->name('wish');
Route::get('/add-to-wish/{id}',[App\Http\Controllers\WishListController::class, 'addToWish'])->name('add.to.wish');
Route::get('/remove-from-wish/{id}',[App\Http\Controllers\WishListController::class, 'remove'])->name('remove.from.wish');

Route::post('/make-order', [App\Http\Controllers\OrderController::class, 'store'])->name('order');

Route::post('/make-comment', [App\Http\Controllers\CommentController::class, 'comment'])->name('comment');

// Route::get('/flush',function(){session()->put('cart', []);session()->put('total', 0);session()->put('wish', []);});
