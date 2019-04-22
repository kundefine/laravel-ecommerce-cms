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
                <h3 class="panel-title">All Product</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                @if(count($all_products))
                <?php $c = 0; ?>

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Id</th>
                            <th>Product Thumbnail</th>
                            <th>Product Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_products as $product)
                            
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$product->id}}</td>

                                <td>
                                    @if(trim($product->product_thumbnail, "\"") === 'nothumbnail.jpg')
                                        <img src="https://via.placeholder.com/50x50?text=No+Thumbnail" />
                                    @else
                                        <img style="width: 50px; height: 50px;" src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}" alt="">
                                    @endif
                                </td>

                                <td>{{$product->product_title}}</td>
                                
                                
                                
                                <td>
                                    <a href="/admin/product/{{$product->id}}/edit">
                                        <span class="fa fa-edit"></span> Edit
                                    </a>
                                </td>

                                <td>
                                    <form action="/admin/product/{{$product->id}}/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure??')">
                                            <span class="fa fa-trash-o"></span> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php $c++; ?>
                        @endforeach
                    </tbody>
                </table>
                    {{-- {{$all_products->links()}} --}}
               @else
                    <p>No Product Found <a href="/admin/product/create">Create New Product</a></p>
                @endif
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>
</div>
@endsection