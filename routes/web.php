<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [FontendController::class, 'index'])->name('fontend.index');
Route::get('/categories/{category_slug}', [FontendController::class, 'category'])->name('fontend.categories');
Route::get('/products/{product_slug}', [FontendController::class, 'products'])->name('fontend.products');

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
