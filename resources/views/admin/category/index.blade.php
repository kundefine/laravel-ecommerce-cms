@extends('admin.layout.master')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset("css/admin/form_elements.css") }}" >    
@endsection

@section('aditional-script')
    <script type="text/javascript" src={{asset("js/plugins/bootstrap/bootstrap-select.js")}}></script>
@endsection

@section('right-section')

<div class="row">
    <div class="col-md-12">
        <!-- START PANEL WITH CONTROL CLASSES -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Category</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                </ul>                                
            </div>
            <div class="panel-body">
                @foreach($all_categories as $category)
                    <div class="col-md-4">
                        <div class="tasks" id="tasks_progreess">
                            <div class="task-item task-primary">
                                <div class="task-text">{{$category->title}}</div>
                                <div class="task-footer">
                                    <div class="pull-left">
                                        <a href="/admin/category/{{$category->id}}/edit">
                                            <span class="fa fa-edit"></span> Edit
                                        </a>
                                        
                                    </div>
                                    <div class="pull-right">
                                        <a href="/admin/category/delete/{{$category->id}}">
                                            <span class="fa fa-trash-o"></span> Delete
                                        </a>
                                    </div>
                                </div>                                    
                            </div>  
                        </div>
                    </div>
                @endforeach
            </div>      
            <div class="panel-footer">                                
                
            </div>                            
        </div>
        <!-- END PANEL WITH CONTROL CLASSES -->
    </div>
</div>




@endsection





