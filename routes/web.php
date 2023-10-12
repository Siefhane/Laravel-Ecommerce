<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\api\ProductsController;
use App\Http\Controllers\ProductdbController;
use App\Http\Controllers\CategoryController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\products;

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
Route::resource('category', CategoryController::class);
Route::get('categories/archive', [CategoryController::class,'archive'])->name('categories.archive');
Route::get('categories/{category}/restore', [CategoryController::class,'restore'])->withTrashed()->name('categories.restore');
Route::delete('categories/{category}/delete', [CategoryController::class,'destroy'])->withTrashed()->name('categories.destroy');
 
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    $user = User::where("email", $githubUser->email)->first();
    if(! $user){

            $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->nickname,
            'email' => $githubUser->email,
            'password'=> null,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }


    Auth::login($user);

    return redirect('/home');
});
##################################API
