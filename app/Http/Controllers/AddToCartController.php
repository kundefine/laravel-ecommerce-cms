<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function handelCartRequest(Request $request) {
        $product_data = request('productData');

        \Cart::add([
            'id' => $product_data["id"],
            'name' => $product_data["product_title"],
            'price' => $product_data["product_price_after_discount"],
            'quantity' => $product_data["quantity"]
        ]);

        return "added";
    }
}
