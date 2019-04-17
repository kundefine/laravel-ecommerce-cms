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

use App\Menu;

Route::get('/', function () {
    $menus = Menu::where('visibility', '=', '1')->get();
    return view('fontend.index', compact('menus'));
})->name('home');


Route::get('/admin', 'AdminController@index');

Route::get('/admin/category', 'CatagoryController@index');
Route::get('/admin/category/create', 'CatagoryController@create');
Route::get('/admin/category/{catagory}/edit', 'CatagoryController@edit');
Route::post('/admin/category/store', 'CatagoryController@store');
Route::patch('/admin/category/{catagory}/update', 'CatagoryController@update');
Route::delete('/admin/category/{catagory}/delete', 'CatagoryController@destroy');

Route::get('/admin/menu', 'MenuController@index');
Route::get('/admin/menu/create', 'MenuController@create');
Route::get('/admin/menu/{menu}/edit', 'MenuController@edit');
Route::post('/admin/menu/store', 'MenuController@store');
Route::patch('/admin/menu/{menu}/update', 'MenuController@update');
Route::delete('/admin/menu/{menu}/delete', 'MenuController@destroy');

Route::get('/admin/product', 'ProductController@index');
Route::get('/admin/product/create', 'ProductController@create');

Route::post('/admin/product/store', 'ProductController@store');
