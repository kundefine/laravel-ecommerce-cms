@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >
@endsection

@section('aditional-script')

        <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
        <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-file-input.js")}}></script>
        
        <script type="text/javascript" src={{asset("js/plugins/dropzone/dropzone.min.js")}}></script>
        <script type="text/javascript" src={{asset("js/plugins/fileinput/fileinput.min.js")}}></script>        
        <script type="text/javascript" src={{asset("js/plugins/filetree/jqueryFileTree.js")}}></script>

        <script>
            $('.banner').fileinput({
                showUpload: false
            });
        </script>





    
@endsection

@section('right-section')




<div class="row">
    {{-- Add Home Bottom Banner --}}
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Add Home Bottom Banner</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                <form action="/admin/banner/add-home-bottom-banner" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="">Upload Image</label>
                      <input type="file" name="banner_img" class="file banner" placeholder="Add top Banner" data-preview-file-type="any"/>
                      <small id="helpId" class="text-muted">upload size</small>
                    </div>
                    <div class="form-group">
                        <label for="">Add URL</label>
                        <select class="form-control" name="banner_url">
                            <option value="">Select One</option>
                            @foreach ($all_link as $link)
                                <option value="{{$link}}">{{$link}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="banner_type" value="bottom_home_banner">

                    <button type="submit" class="btn btn-primary btn-md btn-block">Submit</button>
                </form>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Home Bottom Banner</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
         
                <table class="table table-bordered banner-data">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>URL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($bottomHomeBanner))
                        @foreach ($bottomHomeBanner as $homeBottomBannerSingle)
                            <tr>
                                <td scope="row"><img src="{{$homeBottomBannerSingle->banner_img}}" alt=""></td>
                                <td>
                                    <a href="{{$homeBottomBannerSingle->banner_url}}" target="_blank">
                                        {{$homeBottomBannerSingle->banner_url}}
                                    </a>
                                    
                                </td>
                                <td>
                                    <form action="/admin/banner/delete-bottom-banner/{{$homeBottomBannerSingle->id}}/delete" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure??')">
                                            <span class="fa fa-trash-o"></span> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="3">Your Don't Have any Home Bottom Banner</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
    </div>
</div>




@endsection





