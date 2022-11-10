<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PostController;
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
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change');
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'password_update'])->name('password.update');

//Category____
Route::get('category/index',[CategoryController::class, 'index'])->name('category.index');
Route::get('category/add',[CategoryController::class,'create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
Route::get('category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class,'update'])->name('category.update');

Route::resource('/subcategory',SubCategoryController::class);

//Post_____
Route::get('post/index',[PostController::class,'index'])->name('post.index');
Route::get('post/create',[PostController::class,'create'])->name('post.create');
Route::post('post/store',[PostController::class,'store'])->name('post.store');
Route::get('post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('post/delete/{id}',[PostController::class,'destroy'])->name('post.delete');

