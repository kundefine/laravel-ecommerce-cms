<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', compact('all_orders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAsGuest(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        $cart_items_collection = \Cart::getContent();
        $cart_items = \Cart::getContent()->toArray();
        $in_voice_id = uniqid();
        $guest_id = hexdec($in_voice_id);
        $cart = [];
        foreach($cart_items_collection as $singleCartItem) {
            $cart_items[$singleCartItem->id]['total_price'] = $singleCartItem->getPriceSum();
        }
        $cart['item_info'] = $cart_items;
        $cart['subtotal'] = \Cart::getSubTotal();
        
        
        Order::create([
            'invoice_id' => $in_voice_id,
            'user_type' => 'guest',
            'guest_id' => $guest_id,
            'guest_name' => request('name'),
            'guest_email' => request('email'),
            'guest_phone' => request('phone'),
            'guest_shiping_addr' => request('address'),
            'order_item' => json_encode($cart)
        ]);

        \Cart::clear();


        return redirect('/order_added')->with('success', 'Your Order has been added successfully soon our agent will contact with you');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
