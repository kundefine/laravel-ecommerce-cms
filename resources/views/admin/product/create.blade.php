<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Laravel Ecom</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/theme-default-k.css')}}"/>
        <style>
            .theme-settings {
                display: none;
            }
        </style>
        <!-- EOF CSS INCLUDE -->          
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            @include('admin.inc.sidebar')
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                    @include('admin.inc.navigation-vertical')
                <!-- END X-NAVIGATION VERTICAL -->                    
                
          
                         
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    <br><br>
                    @include('admin.inc.alert-message')
                    <br><br>
                
                    {{-- Full Product Adding --}}
                    <form action="/admin/product/store" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <!-- START PANEL WITH CONTROL CLASSES -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add New Product</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-horizontal" role="form">     
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                            
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
                                                            <label class="col-md-2 control-label">Product Title</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Product Title" name="product_title"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Product Discription</label>
                                                            <div class="col-md-10">
                                                                <textarea class="summernote" name="product_discription"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Product Slug</label>
                                                            <div class="col-md-10">
                                                                <input readonly id="product_slug" type="text" class="form-control" placeholder="Product slug" name="product_slug"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Product price</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Product Price" name="product_price"/>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Product Discount</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Product Discount" name="product_discount"/>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">In Stock</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control select" name="product_stock">
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option>
                                                                </select>
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
                        

                            <div class="col-md-4">
                                <!-- START PANEL WITH CONTROL CLASSES -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add Product Thumbnail</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <div class="panel-body">                                 
<<<<<<< HEAD
                                        <div action="#" class="dropzone dropzone-mini" id="product_thumbnail"></div> 
=======
                                        {{-- <div action="#" class="dropzone dropzone-mini" id="product_thumbnail"></div>                            --}}
>>>>>>> refs/remotes/origin/master
                                    </div>      
                                    <div class="panel-footer">                                
                                        
                                    </div>                            
                                </div>
                                <!-- END PANEL WITH CONTROL CLASSES -->
                            </div>


                            <div class="col-md-12">
                                <!-- START PANEL WITH CONTROL CLASSES -->
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Product Images</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        </ul>                                
                                    </div>
                                    <div class="panel-body">
                                        <div action="#" class="dropzone" id="product_images">
                                        </div>                           
                                    </div>      
                                    <div class="panel-footer">                                
                                        
                                    </div>                            
                                </div>
                                <!-- END PANEL WITH CONTROL CLASSES -->
                            </div>

                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-lg btn-success btn-block">Add Product</button>
                                <br><br>
                            </div>
                            
                        </div>
             
</form>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                    
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src={{asset("audio/alert.mp3")}} preload="auto"></audio>
        <audio id="audio-fail" src={{asset("audio/fail.mp3")}} preload="auto"></audio>
        <!-- END PRELOADS -->               
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
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
        <script type="text/javascript" src={{asset("js/plugins/summernote/summernote.js")}}></script>
        <!-- END PAGE PLUGINS -->
        
        <!-- START TEMPLATE -->
        <script type="text/javascript" src={{asset("js/settings.js")}}></script>
        
        <script type="text/javascript" src={{asset("js/plugins.js")}}></script>        
        <script type="text/javascript" src={{asset("js/actions.js")}}></script>
        <!-- END TEMPLATE -->
        
<<<<<<< HEAD
        <!-- <script>
=======
        <script>
>>>>>>> refs/remotes/origin/master
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "any"
                });            
                $("#filetree").fileTree({
                    root: '/',
                    script: 'assets/filetree/jqueryFileTree.php',
                    expandSpeed: 100,
                    collapseSpeed: 100,
                    multiFolder: false                    
                }, function(file) {
                    alert(file);
                }, function(dir){
                    setTimeout(function(){
                        page_content_onresize();
                    },200);                    
                });                
            });            
<<<<<<< HEAD
        </script> -->


        <script>
            

            $(document).ready(function(){
                Dropzone.autoDiscover = false;
                var fileList = [];
                var i = 0;
                $("div#product_thumbnail").dropzone({ url: "/admin/product/else", });
                $("div#product_images").dropzone({ 
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    init: function() {
                        this.on("success", function(file, res) {
                            fileList[i] = {
                                "fileId" : i,
                                "serverFileName" : res.filename, 
                                "fileName" : file.name
                            };
                            i++;
                        });
                    },
                    paramName: "product_images",
                    url: "/admin/product/store",
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    timeout: 1000,
                    renameFile: function (file) {
                        let newName = new Date().getTime() + '_' + file.name;
                        return newName;
                    },
                    removedfile: function(file) {
                        var rmvFile = "";
                        for(f=0;f<fileList.length;f++){
                            if(fileList[f].fileName == file.name)
                            {
                                rmvFile = fileList[f].serverFileName;

                            }
                        }
                        var name = rmvFile;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                            },
                            type: 'DELETE',
                            url: '{{ url("/admin/product/deleteImage") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }
                        });
                        var fileRef;
                        return (fileRef = file.previewElement) != null ? fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },
                });
            });

            

=======
        </script>
        <script>

      
            
            $("div#product_images").dropzone({ url: "/admin/product/store" });
            
>>>>>>> refs/remotes/origin/master
        </script>

    <!-- END SCRIPTS -->         
        
    </body>
</html>






