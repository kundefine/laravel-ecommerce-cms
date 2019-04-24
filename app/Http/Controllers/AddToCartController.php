<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function handelCartRequest(Request $request) {
        $product_data = request('productData');
        $product_measurement_details = json_decode($product_data["product_measurement_details"], true);



        $res = [];
        $cartItemExits = \Cart::get($product_data["id"]);

        if($cartItemExits !== null) {
            $res["cartItemExits"] = true;
            
            \Cart::update($product_data["id"], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $product_data["quantity"]
                ),
                'attributes' => array( // attributes field is optional
                    'thumbnail' => $product_data["product_thumbnail"],
                )
              ));

              $res['added_product'] = array(
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"],
                'thumbnail' => $product_data["product_thumbnail"],
                'total_price' => $cartItemExits->getPriceSum(),
                'sub_total_price' => \Cart::getSubTotal(),
            );

        } else {
            $res["cartItemExits"] = false;

            $newlyAdded = \Cart::add([
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"],
                'attributes' => array( // attributes field is optional
                    'thumbnail' => $product_data["product_thumbnail"],
                )
            ]);

            $res['added_product'] = array(
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"],
                'thumbnail' => $product_data["product_thumbnail"],
                'total_price' => \Cart::get($product_data["id"])->getPriceSum(),
                'sub_total_price' => \Cart::getSubTotal(),
            );

        }

        

        $res["totalCart"] = \Cart::getContent()->count();

        return response()->json($res);
    }

    public function clearCart(Request $request) {
        if(request('clearCart') === "clear the cart") {
            $res["clear"] = \Cart::clear();
            return response()->json($res);
        }
    }

    public function removeCart(Request $request) {
        $res["removed"] = \Cart::remove(request('id'));
        $res["totalCart"] = \Cart::getContent()->count();
        return response()->json($res);
        
    }

    public function updateQuantity(Request $request) {
        $currentProduct = request('currentProduct');
        $updatedQuantity = request('updatedQuantity');

        \Cart::update($currentProduct, [
            'quantity' => array(
                'relative' => false,
                'value' => $updatedQuantity
            ),
        ]);
        
        
        $updatedProductPrice = \Cart::get($currentProduct)->getPriceSum();
        return response()->json(['updatedProductPrice' => $updatedProductPrice]);
    }



    public function updateAttributes(Request $request) {
        if( request()->has('color') ) 
        {
            $currentProduct = request('currentProduct');
            $color = request('color');
    
            $c = \Cart::get($currentProduct);
            $c["attributes"]["color"] = $color;
      
            return response()->json(['currentProduct' => $currentProduct, 'color' => $color, $c]);
        } 
        
        else if( request()->has('size') ) 
        {
            $currentProduct = request('currentProduct');
            $size = request('size');
    
            $c = \Cart::get($currentProduct);
            $c["attributes"]["size"] = $size;
    
            return response()->json(['currentProduct' => $currentProduct, 'size' => $size, $c]);
        }
    }




}
