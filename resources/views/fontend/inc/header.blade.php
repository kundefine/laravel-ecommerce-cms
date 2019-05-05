<header class="header-area">
		<div class="header-top">
			<h2>Free Shipping on Orders over TK.750</h2>
		</div>
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<form action="/search" method="get">
							@csrf
							<div class="search-box">
								<input type="text" class="search-input" placeholder="Search" name="q">
								<button type="submit" id="headSearch"><span class="fas fa-search"></span></button>
							</div>
						</form>
						
					</div>
					<div class="col-lg-4">
						<div class="logo-area">
							<a href="/"><img src={{asset("fontend/assets/img/logo_1.png")}} alt="logo" class="logo"></a>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="right-short-menu">
							<a href="" class="single-items">
								<span class="fas fa-map-marker-alt"></span> Stores
							</a>
							<a href="" class="single-items">
								<span class="fas fa-user"></span> Account
							</a>
							<a id="full-cart-button" href="" class="single-items relative">
								<span class="fas fa-shopping-cart"><div id="cart-total-item" class="cart-total-item">{{Cart::getContent()->count()}}</div></span> cart
							</a>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="main-menubar">
							<nav class="navbar navbar-expand-lg navbar-light">
								<button class="navbar-toggler" type="button" data-toggle="collapse"
									data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
									aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarNavDropdown">
									<ul class="navbar-nav">
										
										@foreach($menus as $menu)
											@if($menu->menu_type === "custom_link")
												<li class="nav-item active">
													<a class="nav-link" href="{{$menu->link}}">{{$menu->title}} <span class="sr-only">(current)</span></a>
												</li>
											@elseif($menu->menu_type === "category_link")
												<li class="nav-item">
													@if($menu->catagory)
														<a class="nav-link {{$menu->catagory->child_catagories_json !== 'null' ? 'dropdown' : ''}}" href="{{$menu->link}}">{{$menu->title}}</a>
														@if($menu->catagory->child_catagories_json !== "null")
														<?php 
														
															$child_cat = json_decode($menu->catagory->child_catagories_json, true);
												
														?>
													
														
													
														<div class="single-menu-items three-collum">
															<div class="row">
																<div class="col-4 single-collum">
																	@foreach ($child_cat as $index => $value )
																	<a href="{{URL::to('/')}}/category/{{$index}}">{{ $value }}</a>
																	{{-- <a href="#">sets</a>
																	<a href="#">Dresses</a>
																	<a href="#">Tops and Tees</a>
																	<a href="#">Rompers, Growers and Playsuits</a>
																	<a href="#">Trousers, Pants and Leggings</a>
																	<a href="#">Cardis, Jackets and Warmers</a>
																	<a href="#">Skirts</a>
																	<a href="#">Sleepwear</a>
																	<a href="#">Shoes</a>
																	<a href="#">Accessories</a> --}}
																	@endforeach
																</div>
																<div class="col-4 single-collum most-viewed-items">
																	{{-- <h2>most viewed items</h2>
																	<div class="single-viewed-items">
																		<img src={{asset("fontend/assets/img/147476.jpg")}} alt="" class="img-fluid">
																		<h3>keedo</h3>
																		<p>Pretty Romper</p>
																	</div>
																	<div class="single-viewed-items">
																		<img src={{asset("fontend/assets/img/147476.jpg")}} alt="" class="img-fluid">
																		<h3>keedo</h3>
																		<p>Pretty Romper</p>
																	</div> --}}
																</div>
																<div class="col-4 single-collum baby-full-img">
																	<img src="{{asset($menu->feature_image)}}" alt="" class="img-fluid">
																</div>
															</div>
														</div>
														@endif
													@endif
												</li>
											@elseif($menu->menu_type === "page_link")
												<li class="nav-item">
													<a class="nav-link" href="{{$menu->link}}">{{$menu->title}}</a>
												</li>
											@endif
										
										@endforeach

										{{-- <!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">baby Boys</a>
											<div class="single-menu-items three-collum">
												<div class="row">
													<div class="col-4 single-collum">
														<a href="#">Layette</a>
														<a href="#">sets</a>
														<a href="#">Dresses</a>
														<a href="#">Tops and Tees</a>
														<a href="#">Rompers, Growers and Playsuits</a>
														<a href="#">Trousers, Pants and Leggings</a>
														<a href="#">Cardis, Jackets and Warmers</a>
														<a href="#">Skirts</a>
														<a href="#">Sleepwear</a>
														<a href="#">Shoes</a>
														<a href="#">Accessories</a>
													</div>
													<div class="col-4 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/147504.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/147504.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
													<div class="col-4 single-collum baby-full-img">
														<img src="fontend/assets/img/Baby_Boys.jpg" alt="" class="img-fluid">
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">Girls</a>
											<div class="single-menu-items five-collum">
												<div class="row">
													<div class="col-2 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
													<div class="col-2 single-collum">
														<a href="#">Dresses</a>
														<a href="#">Tops and Tees</a>
														<a href="#">Trousers, Pants and Leggings</a>
													</div>
													<div class="col-2 single-collum">
														<a href="#">Cardis, Jackets, Warmers</a>
														<a href="#">Sets</a>
														<a href="#">Shoes</a>
													</div>
													<div class="col-3 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146717.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146718.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
													<div class="col-3 single-collum baby-full-img">
														<img src="fontend/assets/img/Girls.jpg" alt="" class="img-fluid">
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">Boys</a>
											<div class="single-menu-items five-collum">
												<div class="row">
													<div class="col-2 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
													<div class="col-2 single-collum">
														<a href="#">Dresses</a>
														<a href="#">Tops and Tees</a>
														<a href="#">Trousers, Pants and Leggings</a>
													</div>
													<div class="col-2 single-collum">
														<a href="#">Cardis, Jackets, Warmers</a>
														<a href="#">Sets</a>
														<a href="#">Shoes</a>
													</div>
													<div class="col-3 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146804.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146718.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
													<div class="col-3 single-collum baby-full-img">
														<img src="fontend/assets/img/Boys.jpg" alt="" class="img-fluid">
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">accessories</a>
											<div class="single-menu-items four-collum">
												<div class="row">
													<div class="col-3 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
													<div class="col-3 single-collum">
														<a href="#">Dresses</a>
														<a href="#">Tops and Tees</a>
														<a href="#">Trousers, Pants and Leggings</a>
													</div>
													<div class="col-3 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146804.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146718.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
													<div class="col-3 single-collum baby-full-img">
														<img src="fontend/assets/img/Boys.jpg" alt="" class="img-fluid">
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">Shoes</a>
											<div class="single-menu-items two-collum">
												<div class="row">
													<div class="col-6 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
													<div class="col-6 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/k628323_velcro_rubber_sole_sneaker.jpg"
																alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/5832_keedo_old-soles-may-week-4-logo-on-thor-runner-sneaker.jpg"
																alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">Gifting</a>
											<div class="single-menu-items four-collum">
												<div class="row">
													<div class="col-3 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
													<div class="col-3 single-collum">
														<a href="#">Dresses</a>
														<a href="#">Tops and Tees</a>
														<a href="#">Trousers, Pants and Leggings</a>
													</div>
													<div class="col-3 single-collum most-viewed-items">
														<h2>most viewed items</h2>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/146811.jpg" alt="" class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
														<div class="single-viewed-items">
															<img src="fontend/assets/img/k418316_1.jpg" alt=""
																class="img-fluid">
															<h3>keedo</h3>
															<p>Pretty Romper</p>
														</div>
													</div>
													<div class="col-3 single-collum baby-full-img">
														<img src="fontend/assets/img/Gifting_Keedo_1.jpg" alt=""
															class="img-fluid">
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link dropdown" href="catagory-page.html">Sale</a>
											<div class="single-menu-items one-collum">
												<div class="row">
													<div class="col-12 single-collum">
														<a href="#">Sleepwear</a>
														<a href="#">Playsuits</a>
														<a href="#">Skirts</a>
														<a href="#">Swimwear</a>
													</div>
												</div>
											</div>
										</li>
										<!--Single Nav Item-->
										<li class="nav-item">
											<a class="nav-link" href="catagory-page.html">Blog</a>
										</li> --}}
									</ul>
								</div>
							</nav>
						</div>

					</div>
				</div>
			</div>
		</div>
	</header>