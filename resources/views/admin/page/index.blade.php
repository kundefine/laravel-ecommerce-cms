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
                @if(count($all_pages))
                <?php $c = 0; ?>

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Page Id</th>
                            <th>Page Title</th>
                            <th>Link</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_pages as $page)
                            
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$page->id}}</td>
                                <td>{{$page->title}}</td>
                                
                                
                                <td>
                                    @if($page->slug === "home")
                                        <a href="/" target="blank"><?php echo url("/"); ?></a>
                                    @else
                                        <a target="blank" href="/page/{{$page->id}}/"><?php echo url("/page/{$page->slug}"); ?></a>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/page/{{$page->id}}/edit">
                                        <span class="fa fa-edit"></span> Edit
                                    </a>
                                </td>

                                <td>
                                    @if($page->slug !== "home")
                                        <form action="/admin/page/{{$page->id}}/delete" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure??')">
                                                <span class="fa fa-trash-o"></span> Delete
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-disabled">
                                            <span class="fa fa-trash-o"></span> Delete
                                         </button>
                                    @endif
                                </td>
                            </tr>

                            <?php $c++; ?>
                        @endforeach
                    </tbody>
                </table>
                    {{-- {{$all_pages->links()}} --}}
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