<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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
Route::prefix('/dashboard')->middleware('verified')->group(function(){
    Route::get('',[DashboardController::class,'index'])->name('dashboard');
    Route::prefix('/product/index')->group(function(){
        Route::get('',[ProductController::class,'index'])->name('dashboard.products.index');
        Route::get('/create',[ProductController::class,'create'])->name('dashboard.products.index.create');
        Route::post('/store',[ProductController::class,'store'])->name('dashboard.products.index.store');
        Route::get('/{product}/edit',[ProductController::class,'edit'])->name('dashboard.products.index.edit');
        Route::put('/{product}/update',[ProductController::class,'update'])->name('dashboard.products.index.update');
        Route::get('/{product}/delete',[ProductController::class,'delete'])->name('dashboard.products.index.delete');


    });


});






Auth::routes(['register'=>false,'verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
