
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    

                        
                    <li class="xn-title">Navigation</li>

                    <?php 
                        $current_url = url()->current();
                        $my_url = url('') . "/admin";
                    ?>
                    <li class="{{$my_url === $current_url ? 'active' : ''}}">
                        <a href="{{$my_url}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bars"></span> <span class="xn-text">Menus</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/menu";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/menu"><span class="fa fa-angle-double-right"></span>All Menu</a></li>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/menu/create";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/menu/create"><span class="fa fa-angle-double-right"></span>Add Menu</a></li>                        
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-list-alt"></span> <span class="xn-text">Categories</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/category";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/category"><span class="fa fa-angle-double-right"></span>All Category</a></li>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/category/create";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/category/create"><span class="fa fa-angle-double-right"></span>Add Category</a></li>                        
                        </ul>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Products</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/product";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/product"><span class="fa fa-angle-double-right"></span>All Product</a></li>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/product/create";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/product/create"><span class="fa fa-angle-double-right"></span>Add Product</a></li>                        
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cubes"></span> <span class="xn-text">Orders</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/order";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/order"><span class="fa fa-angle-double-right"></span>All Order</a></li>                     
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-columns"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/page";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/page"><span class="fa fa-angle-double-right"></span>All page</a></li>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/page/create";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/page/create"><span class="fa fa-angle-double-right"></span>Add page</a></li>                        
                        </ul>
                    </li>

                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-columns"></span> <span class="xn-text">Banner</span></a>
                        <ul>
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/banner/home-bottom-banner";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/banner/home-bottom-banner"><span class="fa fa-angle-double-right"></span>Home Bottom Banner</a></li> 
                            
                            <?php $current_url = url()->current(); $my_url = url('') . "/admin/banner/home-bottom-banner2";?>
                            <li class="{{$my_url === $current_url ? 'active' : ''}}"><a href="/admin/banner/home-bottom-banner2"><span class="fa fa-angle-double-right"></span>Home Bottom Banner 2</a></li>    
                        </ul>
                    </li>


                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            