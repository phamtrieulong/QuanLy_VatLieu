<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReceivedNoteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories');

Route::get('/cart',[App\Http\Controllers\CartController::class,'show']);
Route::get('/cart/add/{id}',[App\Http\Controllers\CartController::class,'add'])->name('cart.add');

Auth::routes();

Route::get('/admin', [DashboardController::class, 'show'])->middleware(['auth','admin'])->name('admin');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function()
{
    Route::get('/users/destroy/{id}',[UserController::class,'destroy']);
    Route::resource('/users', UserController::class);

    Route::get('/brand/list',[BrandController::class,'index']);
    Route::get('/brand/create',[BrandController::class,'create']);
    Route::post('/brand/store',[BrandController::class,'store']);
    Route::get('/brand/edit/{id}',[BrandController::class,'edit']);
    Route::put('/brand/update/{id}',[BrandController::class,'update']);
    Route::get('/brand/destroy/{id}',[BrandController::class,'destroy']);

    Route::get('/cat/index',[CatController::class,'index']);
    Route::get('/cat/create',[CatController::class,'create']);
    Route::post('/cat/store',[CatController::class,'store']);
    Route::get('/cat/edit/{id}',[CatController::class,'edit']);
    Route::put('/cat/update/{id}',[CatController::class,'update']);
    Route::get('/cat/destroy/{id}',[CatController::class,'destroy']);

    Route::get('/product/list',[ProductController::class,'index']);
    Route::get('/product/create',[ProductController::class,'create']);
    Route::post('/product/store',[ProductController::class,'store']);
    Route::get('/product/edit/{id}',[ProductController::class,'edit']);
    Route::put('/product/update/{id}',[ProductController::class,'update']);
    Route::get('/product/delete/{id}',[ProductController::class,'destroy']);

    Route::resource('/received-notes', ReceivedNoteController::class);

    Route::resource('/orders', OrderController::class);

});
