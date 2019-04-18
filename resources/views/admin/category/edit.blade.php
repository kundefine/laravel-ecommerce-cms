@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >    
@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
@endsection

@section('right-section')

<form action="/admin/category/{{$catagory->id}}/update" id="category_create" method="post">

@csrf
@method('PATCH')

<div class="row">
    <div class="col-md-6">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Category</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Category Title" name="category_title" value="{{ $catagory->title }}"/>
                        </div>
                    </div>
                    <div class="form-group">

                    <label class="col-md-2 control-label">Visibility</label>
                    <div class="col-md-10">
                        <div class="col-md-2">
                            <label class="check"><input type="radio" class="iradio" name="visibility" value="1" @if($catagory->visibility == "1") checked @endif /> On</label>
                        </div>
                        <div class="col-md-2">
                            <label class="check"><input type="radio" class="iradio" name="visibility" @if($catagory->visibility == "0") checked @endif value="0" /> Off</label>
                        </div>
                    </div>
                        
                    </div>                                 
                </div>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>

    {{-- <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Select A Menu</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">
                   <div class="form-group">                                        
                        <div class="col-md-12">
                            @foreach($menus as $menu)                                                                                                             
                                <label class="check dpb">
                                    <input 
                                    @if($menu->id == $catagory->menu()->get()->all()[0]->id) checked @endif
                                    type="radio" 
                                    class="iradio" 
                                    name="menu_id" 
                                    value="{{$menu->id}}"/>{{$menu->title}}
                                </label>
                            @endforeach
                        </div>
                    </div>                                               
                </div>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>

  
    </div> --}}

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Select Child</h3>
                <ul class="panel-controls">
                    {{-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li> --}}
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                    {{-- <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li> --}}
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">
                    <div class="form-group">                                        
                        <div class="col-md-12">
                            @if(count( $child_catagories ))
                                @foreach($child_catagories as $category)                                                                                                      
                                    <label class="check dpb">
                                        <input 
                                        @if(in_array($category->id, $allready_child)) checked @endif
                                        type="checkbox" 
                                        class="icheckbox" 
                                        name="child_categories[{{$category->id}}]" 
                                        value="{{$category->title}}"/>{{$category->title}}
                                    </label>    
                                @endforeach
                            @else
                                <p>No Category Found</p>
                            @endif                                                                                                     
                        </div>
                    </div>                                                  
                </div>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
    </div>


    <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary btn-block">Edit Category</button>
    </div>
</div>

</form>


@endsection





