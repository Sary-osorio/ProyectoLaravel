<?php

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

Route::get('/', 'MainController@index')->name('main');

Route::resource('products', 'ProductoController');
// Route::get('products', 'ProductoController@index')->name('products.index');

// Route::get('products/create', 'ProductoController@create')->name('products.create');

// Route::post('products', 'ProductoController@store')->name('products.store');

// Route::get('products/{product}', 'ProductoController@show')->name('products.show');

// Route::get('products/{product}/edit', 'ProductoController@edit')->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}', 'ProductoController@update')->name('products.update');

// Route::delete('products/{product}', 'ProductoController@destroy')->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
