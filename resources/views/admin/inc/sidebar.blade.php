
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <!-- 
                    <li class="xn-logo">
                            <a href="index.html">ATLANT</a>
                            <a href="#" class="x-navigation-control"></a>
                        </li>
                        <li class="xn-profile">
                            <a href="#" class="profile-mini">
                                <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                            </a>
                            <div class="profile">
                                <div class="profile-image">
                                    <img src="assets/images/users/avatar.jpg" alt="John Doe"/>
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name">John Doe</div>
                                    <div class="profile-data-title">Web Developer/Designer</div>
                                </div>
                                <div class="profile-controls">
                                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                                </div>
                            </div>                                                                        
                        </li> 
                        -->

                        
                    <li class="xn-title">Navigation</li>

                    <?php 
                        $current_url = url()->current();
                        $my_url = url('') . "/admin";
                    ?>
                    <li class="{{$my_url === $current_url ? 'active' : ''}}">
                        <a href="{{$my_url}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Categories</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/category";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/category"><span class="fa fa-user"></span>All Category</a></li>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/category/create";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/category/create"><span class="fa fa-image"></span>Add Category</a></li>                        
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Products</span></a>
                        <ul>
                            <li><a href="pages-profile.html"><span class="fa fa-user"></span>All Product</a></li>
                            <li><a href="pages-gallery.html"><span class="fa fa-image"></span>Add Product</a></li>                     
                            <li><a href="pages-gallery.html"><span class="fa fa-orger"></span>Orders</a></li>                     
                        </ul>
                    </li>
                    <li class="xn-title">Components</li>
                    <li>
                        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
                        <ul>                            
                            <li class="xn-openable">
                                <a href="#">Second Level</a>
                                <ul>
                                    <li class="xn-openable">
                                        <a href="#">Third Level</a>
                                        <ul>
                                            <li class="xn-openable">
                                                <a href="#">Fourth Level</a>
                                                <ul>
                                                    <li><a href="#">Fifth Level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            