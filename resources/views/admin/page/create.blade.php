@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >    
    <link rel="stylesheet" href="{{ asset("css/summernote/summernote.css") }}" >    
@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
    <script type="text/javascript" src={{asset("js/plugins/summernote/summernote.js")}}></script>
@endsection

@section('right-section')

<form action="/admin/page/store" id="category_create" method="post">

@csrf

<div class="row">
    <div class="col-md-12">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create Category</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Page Title</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="Page Title" name="title"/>
                        </div>
                    </div>
      
                    <div class="form-group">
                        <label class="col-md-2 control-label">Page Data</label>
                        <div class="col-md-10">
                            <textarea style="min-height: 400px"class="summernote" name="discription" novalidate>{{ old('product_discription') }}</textarea>
                        </div>
                    </div>


                    <div class="form-group">

                        <label class="col-md-2 control-label" value="">Visibility</label>
                        <div class="col-md-10">
                            <div class="col-md-2">
                                <label class="check"><input type="radio" class="iradio" name="visibility" value="1"/> On</label>
                            
                            </div>
                            <div class="col-md-2">
                                <label class="check"><input type="radio" class="iradio" name="visibility" checked="checked" value="0"/> Off</label>
                            
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
                                <label class="check dpb"><input type="radio" class="iradio" name="menu_id" value="{{$menu->id}}"/>{{$menu->title}}</label>
                            @endforeach
                        </div>
                    </div>                                               
                </div>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>

  
    </div> --}}



    <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary btn-block">Create Page</button>
    </div>
</div>

</form>


@endsection





