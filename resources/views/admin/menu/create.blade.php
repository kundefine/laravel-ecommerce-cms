@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >

@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-file-input.js")}}></script>
    <script>
        // menu type action
        $('input[name="menu_type"]').click(function(){
            if($(this).val() === "page_link"){
                // hide others select box
                $('#select_category').css('display', 'none');
                $('#select_category select').attr('disabled', 'disabled');
                // view page select box
                $('#select_page').css('display', 'block');
                $('#select_page select').removeAttr('disabled');
                // reset menu title
                $('input[name="menu_title"]').val('');
                $('#menu_link').val('');
            } else if( $(this).val() === 'category_link') {
                // hide others select box
                $('#select_page').css('display', 'none');
                $('#select_page select').attr('disabled', 'disabled');
                // view category select box
                $('#select_category').css('display', 'block');
                $('#select_category select').removeAttr('disabled');
                // reset menu title
                $('input[name="menu_title"]').val('');
                $('#menu_link').val('');
                console.log('cat link');
            } else if( $(this).val() === 'custom_link') {
                // hide all select box
                $('#select_category').css('display', 'none');
                $('#select_category select').attr('disabled', 'disabled');

                $('#select_page').css('display', 'none');
                $('#select_page select').attr('disabled', 'disabled');

                // reset menu title
                $('input[name="menu_title"]').val('');
                $('#menu_link').val('');
            }
        });

        // page select action
        $('#select_page select').change(function(){
            console.log($(this).val());
            if($(this).val() !== "null") {
                $('input[name="menu_title"]').val($('#select_page select option:selected').text());
                $('#menu_link').val('');
                $('#menu_link').val(window.location.host + '/page/'  + $(this).val());
            } else {
                $('input[name="menu_title"]').val('');
                $('#menu_link').val('');
            }
        });

        // category select action
        $('#select_category select').change(function(){
            console.log($(this).val());
            if($(this).val() !== "null") {
                $('input[name="menu_title"]').val($('#select_category select option:selected').text());
                $('#menu_link').val('');
                $('#menu_link').val(window.location.host + '/category/' + $(this).val());
            } else {
                $('input[name="menu_title"]').val('');
                $('#menu_link').val('');
            }
        });
    </script>
@endsection

@section('right-section')

<form action="/admin/menu/store" id="category_create" method="post" enctype="multipart/form-data">

@csrf

<div class="row">
    <div class="col-md-12">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Create Menu</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">     
                    <div class="col-md-3">
                        <h5>Menu Type</h5>                                                                                                
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="custom_link"/> Custom Link</label>
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="page_link"/> Add Page</label>
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="category_link"/> Add Category</label>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                    <div id="select_page" class="form-group dpn">
                                        <label class="col-md-2 control-label">Select Page</label>
                                        <div class="col-md-10">                                                                                
                                            <select class="form-control select" data-live-search="true" name="page_id">
                                                <option value="null">Select One</option>
                                                <option value="1">Page One</option>
                                                <option value="2">Page Two</option>
                                                <option value="3">Page Three</option>
                                                <option value="4">Page Four</option>
                                            </select>
                                        </div>
                                    </div>
                                @if(count( $categories ))
                                    <div id="select_category" class="form-group dpn">
                                        <label class="col-md-2 control-label">Select Category</label>
                                        <div class="col-md-10">                                                                                
                                            <select class="form-control select" data-live-search="true" name="cat_id">
                                                <option value="null">Select One</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>                                                                                                      
                                @else
                                    <p>Please add some Category</p>
                                @endif                                                                                                     

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Menu Title</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Menu Title" name="menu_title"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Add Link</label>
                                    <div class="col-md-10">
                                        <input id="menu_link" type="text" class="form-control" placeholder="Your link" name="menu_link"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Add Feature Image</label>
                                    <div class="col-md-10">
                                        <input type="file" class="fileinput" name="feature_image" id="feature_image"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Visibility</label>
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
                        </div>
                    </div>                            

                
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>


    <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary btn-block">Create Menu</button>
    </div>
</div>

</form>


@endsection





