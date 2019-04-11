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


Route::get('/admin', 'AdminController@index');

Route::get('/admin/category', 'CatagoryController@index');
Route::get('/admin/category/create', 'CatagoryController@create');
Route::get('/admin/category/{catagory}/edit', 'CatagoryController@edit');
Route::post('/admin/category/store', 'CatagoryController@store');
