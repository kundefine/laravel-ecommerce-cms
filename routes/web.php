<?php

use App\Menu;
use App\Product;
use App\Catagory;



Route::get('/', function () {
    $menus = Menu::where('visibility', '=', '1')->get();
    return view('fontend.index', compact('menus'));

    
})->name('home');


Route::get('/category/{id}', function ($id) {
    $current_cat = Catagory::find($id);
    $categoy_products = Catagory::find($id)->products()->get()->filter( function($singleProduct){ return $singleProduct->visibility == 1; } )->all();
    $menus = Menu::where('visibility', '=', '1')->get();
    return view('fontend.category.index', compact('menus','categoy_products', 'current_cat'));
});

Route::get('/product/{id}', function ($id) {
    $id = (int) $id;

    $product = Product::find($id);
    $menus = Menu::where('visibility', '=', '1')->get();
    return view('fontend.product.index', compact('menus','product'));
});



Route::middleware(['auth'])->group(function () {
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
    Route::post('/admin/product/add-product-images', 'ProductController@addProductImages');
    Route::delete('/admin/product/{product}/delete', 'ProductController@destroy');
    Route::delete('/admin/product/deleteImage', 'ProductController@deleteImage');
    Route::get('/admin/order', 'OrderController@index');

    Route::get('/admin/page', 'PageController@index');
    Route::get('/admin/page/create', 'PageController@create');
    Route::get('/admin/page/{page}/edit', 'PageController@edit');
    Route::patch('/admin/page/{page}/update', 'PageController@update');
    Route::post('/admin/page/store', 'PageController@store');

});





Route::post('/add_to_cart', 'AddToCartController@handelCartRequest');
Route::post('/clear_cart', 'AddToCartController@clearCart');
Route::post('/remove_cart_item', 'AddToCartController@removeCart');
Route::post('/update_cart', 'AddToCartController@updateQuantity');
Route::post('/update_attributes', 'AddToCartController@updateAttributes');

Route::post('/guest/order', 'OrderController@storeAsGuest');
Route::get('/order_added', function(){
    $menus = Menu::where('visibility', '=', '1')->get();
    return view('fontend.order', compact('menus'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
