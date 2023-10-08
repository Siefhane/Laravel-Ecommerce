<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductdbController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('products/array',[ProductController::class, 'Products' ]);
// Route::get('products/{id}',[ProductController::class, 'Show' ]);
// Route::get('/home',[ProductController::class, 'list' ]);
Route::get('/contactus',[ProductController::class, 'contactus' ]);
Route::get('/aboutus',[ProductController::class, 'aboutus' ]);
Route::get('/home',[ProductdbController::class, 'index' ])->name('products.index');
Route::get('products/create', [ProductdbController::class, 'create'])->name('products.create');
Route::get('products/{id}',[ProductdbController::class, 'show'])->name('products.show');
Route::get('products/{id}/delete', [ProductdbController::class, 'destroy'])->name('products.delete');
Route::post('products', [ProductdbController::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductdbController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductdbController::class, 'update'] )->name('products.update');
Route::resource('category', CategoryController::class)->withTrashed();
Route::get('categories/archive', [CategoryController::class,'archive'])->name('categories.archive');
Route::get('categories/{category}/restore', [CategoryController::class,'restore'])->withTrashed()->name('categories.restore');
Route::delete('categories/{category}/delete', [CategoryController::class,'destroy'])->withTrashed()->name('categories.destroy');
