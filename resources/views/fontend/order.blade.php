@extends('fontend.layout.master')


@section('content-section');

<section class="order-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-success text-center">INVOICE ID - {{$order->invoice_id}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="user_information">
                                <h5 class="text-primary">YOUR DETAILS</h5>
                                <div class="user-info">
                                    <div>
                                        <strong>User Id</strong> - <span>{{$order->guest_id}}</span>
                                    </div>

                                    <div>
                                        <strong>Name</strong> - <span>{{$order->guest_name}}</span>
                                    </div>
                                    <div>
                                        <strong>Email</strong> - <span>{{$order->guest_email}}</span>
                                    </div>

                                    <div>
                                        <strong>Phone</strong> - <span>{{$order->guest_phone}}</span>
                                    </div>

                                        <div>
                                        <strong>Shiping Address</strong> - <span>{{$order->guest_shiping_addr}}</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-primary">
                            <div class="payment_information">
    
                                <h5 class="text-primary">YOUR PAYMENT DETAILS</h5>
                                <div class="user-info">
                                    <div>
                                        <strong>Location</strong> - <span>{{$order->location}}</span>
                                    </div>
                                    <div>
                                        <strong>Payment Method</strong> - <span>{{$order->payment_method}}</span>
                                    </div>
                                    <?php 
                                        $payment_info = json_decode($order->payment_info, true);
                                        
                                    ?>
                                    @if(!empty($payment_info))
                                        <div>
                                            <strong>Account Number</strong> - <span>{{ $payment_info[$order->payment_method . '_acc_num'] }}</span>
                                        </div>
                                        <div>
                                            <strong>Transection Id</strong> - <span>{{ $payment_info[$order->payment_method . '_acc_tran_id'] }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>


                        <div class="col-md-8">
                            <h5 class="text-primary">YOUR ORDER DETAILS</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Product id</th>
                                    <th>Product name</th>
                                    <th>color</th>
                                    <th>size</th>
                                    <th>Product price</th>
                                    <th>Product quantity</th>
                                    <th>Product total price</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        $orderItems = json_decode($order->order_item, true) 
                                    ?>
                                    @foreach( $orderItems['item_info'] as $item ) 
                                        <tr>
                                            <td>{{ $item["id"] }}</td>
                                            <td>{{ $item["name"] }}</td>
                                            <td>@if( isset($item["attributes"]["color"]) ) {{ $item["attributes"]["color"] }} @endif </td>
                                            <td>@if( isset($item["attributes"]["size"]) ) {{ $item["attributes"]["size"] }} @endif </td>
                                            <td>{{ $item["price"] }}</td>
                                            <td>{{ $item["quantity"] }}</td>
                                            <td>{{ $item["total_price"] }}</td>
                                        </tr>
                                        
                                    @endforeach
                                        <tr>
                                            <th colspan="6" style="text-align: right">SubTotal</th>
                                            <td>{{ $orderItems['subtotal'] }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                        
   

                    </div>
            </div>
        </div>
    </div>
</section>

{{-- photo galary --}}
@include('fontend.inc.photo-galary')

@endsection('content-section')