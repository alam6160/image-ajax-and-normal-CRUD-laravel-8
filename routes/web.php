<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;


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


//crud route and dashboard route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::Group([ 'middleware' => 'auth']),function(){



  Route::get('/show-product', [productController::class, 'show'])->name('products.show');

  Route::get('/insert-product', [productController::class, 'create'])->name('products.create');

  Route::post('/create-product',[productController::class,'insert'])->name('products.insert');

  Route::get('/display-product/{id}',[productController::class,'display']);

  Route::get('/edit-product/{id}',[productController::class,'edit']);

  Route::post('/update-product/{id}',[productController::class,'update'])->name('products.update');

  Route::get('/delete-product/{id}',[productController::class,'delete'])->name('products.destroy');


};

 


