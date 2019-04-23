<div id="cart-item-list" class="all-card-item-wraper">
    <div class="row cart-table-w">
        <div class="col-md-12">
            <table class="table table-bordered" style="font-size: 12px">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody id="add-cart-item">
                    @if(\Cart::getContent()->count())
                        @foreach (\Cart::getContent() as $singleCartItem )

                        <tr id="single-cart-item-{{$singleCartItem->id}}" class="single-cart-item">
                            <th scope="row">baby-{{$singleCartItem->id}}</th>
                            <td>{{$singleCartItem->name}}</td>
                            <td>{{$singleCartItem->price}}</td>
                            <td>{{$singleCartItem->quantity}}</td>
                            <td>{{$singleCartItem->getPriceSum()}}</td>
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

                    <div id="checkout" class="col-md-4">
                        <a href="/checkout" class="btn btn-warning btn-block">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="cart-info"></div>