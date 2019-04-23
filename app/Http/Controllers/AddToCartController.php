<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function handelCartRequest(Request $request) {
        $product_data = request('productData');
        $res = [];
        $cartItemExits = \Cart::get($product_data["id"]);

        if($cartItemExits !== null) {
            $res["cartItemExits"] = true;
            
            \Cart::update($product_data["id"], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $product_data["quantity"]
                ),
              ));

              $res['added_product'] = array(
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"],
                'total_price' => $cartItemExits->getPriceSum(),
                'sub_total_price' => \Cart::getSubTotal(),
            );

        } else {
            $res["cartItemExits"] = false;

            $newlyAdded = \Cart::add([
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"]
            ]);

            $res['added_product'] = array(
                'id' => $product_data["id"],
                'name' => $product_data["product_title"],
                'price' => $product_data["product_price_after_discount"],
                'quantity' => $product_data["quantity"],
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




}
