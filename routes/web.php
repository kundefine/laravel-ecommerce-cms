<?php

use App\Menu;
use App\Product;
use App\Catagory;
use App\Order;



Route::get('/', 'PageController@home')->name('home');
Route::get('/page/{pageSlug}', 'PageController@page');



Route::get('/category/{id}', function ($id) {
    $current_cat = Catagory::findOrFail($id);
    $categoy_products = Catagory::find($id)->products()->get()->filter( function($singleProduct){ return $singleProduct->visibility == 1; } )->all();
    return view('fontend.category.index', compact('categoy_products', 'current_cat'));
});

Route::get('/product/{id}', function ($id) {
    $id = (int) $id;
    $product = Product::findOrFail($id);
    return view('fontend.product.index', compact('product'));
});

Route::get('/order_added', function(){
    $in_voice_id = $_GET['invoice_id'] ?? null;
    $order = Order::where('invoice_id', '=', $in_voice_id )->first();
    if($order !== null) {
        $order->getAttributes();
    } else {
        return redirect('/');
    }

    return view('fontend.order', compact( 'order'));
});

Route::get('/search', function(){
    $searchTerm = request()->get('q');

    $all_products = Product::where('product_title', 'LIKE', "%{$searchTerm}%")->get();

    return view('fontend.search', compact( 'all_products'));
});




Route::middleware(['is_admin'])->group(function () {
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
    Route::patch('/admin/menu/{menu}/update', 'MenuController@update');
    Route::post('/admin/menu/store', 'MenuController@store');
    Route::patch('/admin/menu/{menu}/update', 'MenuController@update');
    Route::delete('/admin/menu/{menu}/delete', 'MenuController@destroy');

    Route::get('/admin/product', 'ProductController@index');
    Route::get('/admin/product/create', 'ProductController@create');

    Route::get('/admin/product/{product}/edit', 'ProductController@edit');

    Route::post('/admin/product/store', 'ProductController@store');
    Route::patch('/admin/product/{product}/update', 'ProductController@update');
    Route::delete('/admin/product/{product}/delete', 'ProductController@destroy');



    Route::post('/admin/product/add-product-images', 'ProductController@addProductImages');
    Route::delete('/admin/product/deleteImage', 'ProductController@deleteImage');
    Route::delete('/admin/product/removeImage', 'ProductController@removeImage');


    Route::get('/admin/order', 'OrderController@index');
    Route::delete('/admin/order/{order}/delete', 'OrderController@destroy');

    Route::get('/admin/page', 'PageController@index');
    Route::get('/admin/page/create', 'PageController@create');
    Route::get('/admin/page/{page}/edit', 'PageController@edit');
    Route::get('/admin/page/{page}/home-edit', 'PageController@homeEdit');
    Route::patch('/admin/page/{page}/update', 'PageController@update');
    Route::patch('/admin/page/{page}/home-update', 'PageController@homeUpdate');



    Route::get('/admin/banner/home-bottom-banner', 'BannerController@bottomBannerIndex');
    Route::post('/admin/banner/add-home-bottom-banner', 'BannerController@addBottomBannerCreate');
    Route::delete('/admin/banner/delete-bottom-banner/{homeBottomBannerId}/delete', 'BannerController@deleteBottomBannerDestroy');

    Route::get('/admin/banner/home-bottom-banner2', 'BannerController@bottomBannerIndex2');
    Route::post('/admin/banner/add-home-bottom-banner2', 'BannerController@addBottomBannerCreate');
    Route::delete('/admin/banner/delete-bottom-banner2/{homeBottomBannerId}/delete', 'BannerController@deleteBottomBannerDestroy');





    Route::post('/admin/page/store', 'PageController@store');
    Route::delete('/admin/page/{page}/delete', 'PageController@destroy');



});





Route::post('/add_to_cart', 'AddToCartController@handelCartRequest');
Route::post('/clear_cart', 'AddToCartController@clearCart');
Route::post('/remove_cart_item', 'AddToCartController@removeCart');
Route::post('/update_cart', 'AddToCartController@updateQuantity');
Route::post('/update_attributes', 'AddToCartController@updateAttributes');
Route::post('/guest/order', 'OrderController@storeAsGuest');


Route::middleware(['auth'])->group(function () {
    Route::get('/user', 'UserController@frontendIndex');
    Route::post('user/add-shipping-address', 'UserController@saveUserShippingAddress');
});






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
