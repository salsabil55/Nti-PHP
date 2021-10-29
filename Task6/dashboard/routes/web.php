<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\stock\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::group(['prefix' => 'products','as'=>'products.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::put('update/{product_id}', [ProductController::class, 'update'])->name('update');


    });
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
