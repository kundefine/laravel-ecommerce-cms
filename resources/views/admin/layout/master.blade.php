@include('admin.inc.header')
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


                <!-- START BREADCRUMB -->
                @include('admin.inc.breadcrumb')
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->
                    {{-- @include('admin.inc.start-widgets') --}}
                    <!-- END WIDGETS -->                    
                    
                    {{-- 
                    
                    <div class="row">
                        <div class="col-md-8">
                            
                            <!-- START SALES BLOCK -->
                            @include('admin.inc.sales-block')
                            <!-- END SALES BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            <!-- START PROJECTS BLOCK -->
                            @include('admin.inc.project-block')
                            <!-- END PROJECTS BLOCK -->
                        </div>
                    </div> 
                    
                    --}}
                    
                    {{-- 
                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <!-- START SALES & EVENTS BLOCK -->
                            @include('admin.inc.sales-events-block')
                            <!-- END SALES & EVENTS BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START USERS ACTIVITY BLOCK -->
                            @include('admin.inc.users-activity-block')
                            <!-- END USERS ACTIVITY BLOCK -->
                            
                        </div>
                        <div class="col-md-4">
                            
                            <!-- START VISITORS BLOCK -->
                            @include('admin.inc.visitors-block')
                            <!-- END VISITORS BLOCK -->
                            
                        </div>
                    </div> 
                    
                    --}}

                    @yield('right-section')
                    

                    <!-- START DASHBOARD CHART -->
                    {{-- @include('admin.inc.dashboard-chart') --}}
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->


        </div>
        <!-- END PAGE CONTAINER -->

        
        <!-- FLOATED WINDOW-->
        @include('admin.inc.float-window')
        <!-- END FLOATED WINDOW-->
                         
        
    <!-- START SCRIPTS -->
        @include('admin.inc.scripts')
    <!-- END SCRIPTS -->         
    </body>
</html>






