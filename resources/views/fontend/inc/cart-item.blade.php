<div id="cart-item-list" class="all-card-item-wraper">


    <?php  
        $global_products = config('global.all_product');
       // $global_products::find($singleCartItem->id);

    ?>

    <div class="row cart-table-w">
        <div class="col-md-12">
            <table class="table table-bordered" style="font-size: 12px">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Product Code</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Seletc Color</th>
                    <th scope="col">Seletc Size</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody id="add-cart-item">
                    @if(\Cart::getContent()->count())
                        @foreach (\Cart::getContent() as $singleCartItem )
                        
                        <tr id="single-cart-item-{{$singleCartItem->id}}" class="single-cart-item">
                            <th scope="row">baby-{{$singleCartItem->id}}</th>
                            <td class="cart-thumbnail">

                                @if(trim($singleCartItem->attributes->thumbnail, "\"") === 'nothumbnail.jpg')
                                    <img src="https://via.placeholder.com/468x480?text=No+Image+Found">
                                @else
                                    <img src="/product_images/product_{{$singleCartItem->id}}/{{trim($singleCartItem->attributes->thumbnail, "\"")}}">
                                @endif
                            </td>
                            <td>{{$singleCartItem->name}}</td>
                            <td>{{$singleCartItem->price}}</td>
                            <td class="cart_quantity"><input min="1" class="quantityChange" type="number" name="quantity" quantitychange="{{$singleCartItem->id}}" value="{{$singleCartItem->quantity}}"></td>
                            <?php 
                                $product_measurement_details = json_decode($global_products::find($singleCartItem->id)->product_measurement_details, true);
                            ?>
                            @if(is_array($product_measurement_details["color_name"]))
                                <td>
                                    <select class="colorChange" name="" required form="quick-buy-form" colorchange="{{$singleCartItem->id}}">
                                        <option value={{null}}>Select One</option>
                                        @foreach ( $product_measurement_details["color_name"] as $color )
                                            <option value="{{$color}}">{{$color}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @endif
                            
                            @if(is_array($product_measurement_details["size"]))
                                <td>
                                    <select class="sizeChange" name="" required form="quick-buy-form" sizechange="{{$singleCartItem->id}}">
                                        <option value={{null}}>Select One</option>
                                        @foreach ($product_measurement_details["size"] as $size )
                                        <option value="{{$size}}">{{$size}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @endif


                            <td  class="totalPrice">{{$singleCartItem->getPriceSum()}}</td>
                            <td class="cart-remove" style="cursor: pointer;"><i id="{{$singleCartItem->id}}" class="fas fa-trash remove-cart"></i></td>
                        </tr>
                        @endforeach
                    @else
                        {{-- <tr class="single-cart-item">
                            <td colspan="5">Cart is Empty</td>
                        </tr> --}}
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div id="close-cart" class="close-cart">
                <div class="row">
                    <div class="col-md-4">
                        <button id="clear-cart" class="btn btn-primary btn-block">Clear Cart</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success btn-block">close</button>
                    </div>

                    {{-- <div id="checkout" class="col-md-4">
                        <a href="/checkout" class="btn btn-warning btn-block">Checkout</a>
                    </div> --}}

                    <div id="checkout" class="col-md-4">
                        <a href="#" id="quick-buy" class="btn btn-warning btn-block">Quick Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="cart-info"></div>

{{-- quick buy form --}}
<form action="/guest/order" id="quick-buy-form" method="post">
    @csrf

    <div class="form-group">
        <label for="name">Your Name</label> <label for="" id="close-quick-buy-form" style="float: right">close</label>
        <input type="text" class="form-control" name="name" required placeholder="Enter Your Name">
    </div>

    <div class="form-group">
        <label for="email">Your email</label>
        <input type="email" class="form-control" name="email" required placeholder="Enter Your Email">
    </div>

    <div class="form-group">
        <label for="phone">Your Phone</label>
        <input type="text" class="form-control" name="phone" required placeholder="Enter Your Phone">
    </div>

    <div class="form-group">
        <label for="address">Delivery Location</label>
        <select class="form-control" name="location" id="" required>
            <option value="">None</option>
            <option value="inside_dhaka">Inside Dhaka City</option>
            <option value="outside_dhaka">Outside Dhaka City</option>
        </select>
    </div>


    <div class="form-group">
        <label for="address">Your Shiping Address</label>
        <textarea type="text" class="form-control" name="address" required placeholder="Enter address here"></textarea>
    </div>

    <div class="form-group">
        <label for="address">Select Your Payment Option</label>
        <select class="form-control" name="payment_method" id="payment_method" required>
            <option value="">None</option>
            <option value="cash_on_delivery">Cash On Delivery</option>
            <option value="bkash">Bkash</option>
            <option value="rocket">Rocket</option>
        </select>
    </div>

    {{-- Bkash --}}
    <div class="form-group payment_option" id="bkash">
        <h6 for="address">Bkash Payment</h6>
        <div class="row">
            <div class="col-md-6">
                <label for="address">Your bkash Account Number</label>
                <input type="text" class="form-control" name="payment_info[bkash_acc_num]" placeholder="Your bkash Account Number"> 
            </div>

            <div class="col-md-6">
                <label for="address">bkash Transaction Id</label>
                <input type="text" class="form-control" name="payment_info[bkash_acc_tran_id]" placeholder="bkash Transaction Id"> 
            </div>
        </div>
    </div>

    {{-- Rocket Payment --}}
    <div class="form-group payment_option" id="rocket">
        <h6 for="address">Rocket Payment</h6>
        <div class="row">
            <div class="col-md-6">
                <label for="address">Your Rocket Account Number</label>
                <input type="text" class="form-control" name="payment_info[rocket_acc_num]" placeholder="Your rocket Account Number"> 
            </div>

            <div class="col-md-6">
                <label for="address">Rocket Transaction Id</label>
                <input type="text" class="form-control" name="payment_info[rocket_acc_tran_id]" placeholder="rocket Transaction Id"> 
            </div>
        </div>
    </div>


    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>