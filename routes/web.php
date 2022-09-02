<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Product
//Route::get('/index',[ProductController::class, 'index']);
Route::get('products',[ProductController::class,'index']);
Route::get('add_product',[ProductController::class,'create']);
Route::post('add_product',[ProductController::class,'store'])->name('add_product');
Route::get('edit_product/{id}',[ProductController::class,'edit']);
route::put('update-product/{id}',[ProductController::class,'update']);
route::get('delete-product/{id}',[ProductController::class,'destroy']);