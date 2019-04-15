@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >

@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-file-input.js")}}></script>
    <script>
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
            } else if( $(this).val() === 'category_link') {
                // hide others select box
                $('#select_page').css('display', 'none');
                $('#select_page select').attr('disabled', 'disabled');
                // view category select box
                $('#select_category').css('display', 'block');
                $('#select_category select').removeAttr('disabled');
                // reset menu title
                $('input[name="menu_title"]').val('');
                console.log('cat link');
            } else if( $(this).val() === 'custom_link') {
                // hide all select box
                $('#select_category').css('display', 'none');
                $('#select_category select').attr('disabled', 'disabled');

                $('#select_page').css('display', 'none');
                $('#select_page select').attr('disabled', 'disabled');

                // reset menu title
                $('input[name="menu_title"]').val('');
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
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="custom_link"/> Custom Link</label>
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="page_link"/> Add Page</label>
                        <label class="check dpb"><input type="radio" class="iradio" name="menu_type" value="category_link"/>Add Category</label>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-12">
                                    <div id="select_page" class="form-group dpn">
                                        <label class="col-md-2 control-label">Select Page</label>
                                        <div class="col-md-10">                                                                                
                                            <select class="form-control select" data-live-search="true" name="page_id">
                                                <option value="page_one">Page One</option>
                                                <option value="page_two">Page Two</option>
                                                <option value="page_three">Page Three</option>
                                                <option value="page_four">Page Four</option>
                                            </select>
                                        </div>
                                    </div>
                                @if(count( $categories ))
                                    <div id="select_category" class="form-group dpn">
                                        <label class="col-md-2 control-label">Select Category</label>
                                        <div class="col-md-10">                                                                                
                                            <select class="form-control select" data-live-search="true" name="cat_id">
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
                                        <input type="text" class="form-control" placeholder="Menu Title" name="menu_link"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Add Feature Image</label>
                                    <div class="col-md-10">
                                        <input type="file" class="fileinput" name="feature_image[]" id="feature_image" multiple/>
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





