@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >    
    <link rel="stylesheet" href="{{ asset("css/admin/tabs.css") }}" >    
    <link rel="stylesheet" href="{{ asset("css/summernote/summernote.css") }}" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .form-control {
            height: 34px;
        }

        .top_banner_preview {
            width: 100%;
            height: 200px;
            overflow: hidden;
            padding: 10px;
            border: 1px solid #ddd;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .top_banner_preview img {
            height: 100%;
        }

        
        .bottom_banner_tbl {
            border: 1px solid #ddd;
        }
        table.bottom_banner_tbl td img {
            width: 136px;
            height: 77px;
        }
        .bottom_banner_tbl tr td {
            vertical-align: middle !important;
            text-align: center;
        }
        .errors {
            border: 1px solid darkred;
        }
        .errors-feedback {
            margin-top: 10px;
            padding: 5px;
        }
    </style>
       
@endsection

@section('aditional-script')
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap.min.js")}}></script>                 
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->    
        <script type='text/javascript' src={{asset('js/plugins/icheck/icheck.min.js')}}></script>
        <script type="text/javascript" src={{asset("js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js")}}></script>
        <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
        <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-file-input.js")}}></script>
        
        <script type="text/javascript" src={{asset("js/plugins/dropzone/dropzone.min.js")}}></script>
        <script type="text/javascript" src={{asset("js/plugins/fileinput/fileinput.min.js")}}></script>        
        <script type="text/javascript" src={{asset("js/plugins/filetree/jqueryFileTree.js")}}></script>

        <script>
            $('#top-banner').fileinput({
                showUpload: false
            });
        </script>





    
@endsection

@section('right-section')

<form action="/admin/page/{{$page->id}}/home-update" id="category_create" method="post" enctype="multipart/form-data">

@csrf
@method('patch')

<div class="row">
    {{-- Home Edit --}}
    <div class="col-md-12">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Edit Home Page</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="form-horizontal" role="form">                                    
                    <div class="form-group">
                        <label class="col-md-2 control-label">Page Title</label>
                        <div class="col-md-10">
                            
                            <input type="text" {{ $page->slug === "home" ? 'readonly' : '' }} class="form-control" placeholder="Page Title" name="title" value="{{ $page->title }}"/>
                        </div>
                    </div>


                    <div class="form-group">

                        <label class="col-md-2 control-label" value="">Visibility</label>
                        <div class="col-md-10">
                            <div class="col-md-2">
                                <label class="check"><input type="radio" class="iradio" name="visibility" value="1" @if($page->visibility == "1") checked @endif /> On</label>
                            </div>
                            <div class="col-md-2">
                                <label class="check"><input type="radio" class="iradio" name="visibility" @if($page->visibility == "0") checked @endif value="0" /> Off</label>
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


    {{-- Home Top Banner --}}
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Top Home Banner</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Add Banner (1350 x 400)</label>
                                        <input type="file" id="top-banner" name="top_banner" class="file top-banner" placeholder="Add top Banner" data-preview-file-type="any"/>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Add URL</label>
                                        <select class="form-control" name="top_banner_url">
                                            <option value="">Select One</option>
                                            @foreach ($all_link as $link)
                                                <option value="{{$link}}">{{$link}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <?php 
                                $top_banner = json_decode($page->discription, true);
                            ?>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Preview (1350 x 400)</label>
                                        <div class="top_banner_preview">
                                            <img src="/{{$top_banner['top_banner']['path']}}" alt="">
                                        </div>
                                        <label>Link: <a target="_blank" href="{{$top_banner['top_banner']['link']}}">{{$top_banner['top_banner']['link']}}</a></label>
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
    </div>


    
    <div class="col-md-4 col-md-offset-4">
        <button type="submit" class="btn btn-primary btn-block">Update Page</button>
    </div>
</div>

</form>


@endsection





