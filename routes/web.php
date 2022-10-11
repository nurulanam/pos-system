<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
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

Route::get('/admin', function (){
    return redirect('/dashboard');
});

//dashboard routes
Route::controller(DashboardController::class)->prefix('/dashboard')->middleware(['auth'])->group(function (){
    Route::get('/', 'index')->name('dashboard');

    //Product Routes
    Route::controller(ProductController::class)->prefix('/product')->group(function (){
        Route::get('/add', 'add')->name('product.add');
    });

    //user
    Route::resource('/user', 'App\Http\Controllers\UserController'); //user

    //Product
    Route::resource('/product', 'App\Http\Controllers\ProductController'); //product

    //Category Routes
    Route::controller(CategoryController::class)->prefix('/category')->group(function (){
        Route::get('/', 'show')->name('category.show');
        Route::get('/add', 'add')->name('category.add');
        Route::post('/store', 'store')->name('category.store');
        Route::get('/{category_slug}/edit', 'edit')->name('category.edit');
        Route::post('/{id}', 'update')->name('category.update');
    });


});

require __DIR__.'/auth.php';
