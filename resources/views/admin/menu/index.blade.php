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
                <h3 class="panel-title">All menu</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                @if(count($all_menus))
                <?php $c = 0; ?>

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Menu Id</th>

                            <th>Menu Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_menus as $menu)
                            <tr>
                                <td>{{$c}}</td>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->title}}</td>
                                <td>
                                    <a href="/admin/menu/{{$menu->id}}/edit">
                                        <span class="fa fa-edit"></span> Edit
                                    </a>
                                </td>
                                <td>
                                    <form action="/admin/menu/{{$menu->id}}/delete" method="POST">
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
                    {{-- {{$all_menus->links()}} --}}
               @else
                    <p>No Menu Found <a href="/admin/menu/create">Create New Menu</a></p>
                @endif
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>
</div>
@endsection











