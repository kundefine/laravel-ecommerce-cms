@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >    
@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
    <script type="text/javascript" src={{asset("js/plugins/datatables/jquery.dataTables.min.js")}}></script>
  
   
@endsection

@section('right-section')

<div class="row">
    <div class="col-md-12">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Orders</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                @if(count($all_orders))
                <?php $c = 0; ?>

                <table class="table table-bordered datatable" id="#example" data-sort="desc">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Id</th>
                            <th>Invoice Id</th>
                            <th>User Information</th>
                            <th>Order Item</th>
                            <th>Payment Information</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_orders as $order)
                            
                            <tr>

                                <td>{{$c}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->invoice_id}}</td>
                                <td>
                                    <div class="user-info">
                                        <div>
                                            <strong>User Id</strong> - <span>{{$order->guest_id}}</span>
                                        </div>

                                        <div>
                                            <strong>User Name</strong> - <span>{{$order->guest_name}}</span>
                                        </div>
                                        <div>
                                            <strong>User Email</strong> - <span>{{$order->guest_email}}</span>
                                        </div>

                                        <div>
                                            <strong>User Phone</strong> - <span>{{$order->guest_phone}}</span>
                                        </div>

                                         <div>
                                            <strong>User Address</strong> - <span>{{$order->guest_shiping_addr}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
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
                                </td>
                                <td>
                                    <div class="user-info">
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
                                    
                                </td>

                                <td>
                                    <form action="/admin/order/{{$order->id}}/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure??')">
                                            <span class="fa fa-trash-o"></span> Delete
                                        </button>
                                    </form>
                                </td>






                                {{-- <td>
                                    @if(trim($order->order_thumbnail, "\"") === 'nothumbnail.jpg')
                                        <img src="https://via.placeholder.com/50x50?text=No+Thumbnail" />
                                    @else
                                        <img style="width: 50px; height: 50px;" src="/order_images/order_{{$order->id}}/{{trim($order->order_thumbnail, "\"")}}" alt="">
                                    @endif
                                </td> --}}

  <?php $c++; ?>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>
</div>
@endsection