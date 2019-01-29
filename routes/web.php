<?php

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
//Route::resource('crud', 'CRUDController');
Route::get('/products', 'StoreController@index');
Route::get('/products/create', 'StoreController@create');
Route::get('/products/edit/{product}', 'StoreController@edit');
Route::post('/products/store', 'StoreController@store');
Route::put('/products/edit/{product}', 'StoreController@update');
Route::delete('/products/destroy/{product}', 'StoreController@destroy');

//Route::get('/edit/{crud}', 'CRUDController@edit')->name('edit');
//Route::put('/edit/{crud}', 'CRUDController@update')->name('update');
