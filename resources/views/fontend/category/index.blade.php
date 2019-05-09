@extends('fontend.layout.master')


@section('content-section')

	<section class="product-catagory">
		<div class="listing-title">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 wrap-title">
						<ul class="title-order">
							<li> <a href="/">Home</a></li>
							<li> <a href="/category/{{$current_cat->id}}">{{$current_cat->title}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
					

					@if(empty($categoy_products))
						<div class="col-md-4 m-auto" style="height: 500px;">
							<h2 style=" margin-top: 100px">No product found</h2>
						</div>
					@else

					{{-- Filter Area --}}
					<div class="col-lg-3 left-side-bar">
						<form action="{{ url()->current() }}" method="get" id="product_filter_form">
							<div class="filter-section" id="filter-bar">
								{{-- Clear Filter --}}
								<input type="hidden" name="filter">
								
								<div class="clear-filter">
									<h6 style="margin-top: 15px;">Clear Filter</h6>

										@if(request()->has('filter'))
											{{--@foreach(request()->all() as $filter => $value)
												@if($value !== null)
													<button type="button" class="btn btn-warning btn-sm badge">
														 {{ $filter }} <span class="badge">x</span>
													</button>
												@endif
											@endforeach--}}

										<a href="{{ url()->current() }}" class="btn btn-warning badge">
											Clear Filter <span class="badge">x</span>
										</a>

										@endif
								</div>

							<!--Single Filter area-->
							{{-- Price Filter Start --}}
								<div class="single-filter-items">
								<div class="heading" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" >
											Price
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseOne" class="collapse {{ request('price_min') || request('price_max') ? 'show' : '' }}">
									<div class="card-body">
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<input
															type="text"
															name="price_min"
															id=""
															class="form-control"
															placeholder="min"
															<?php
																if(request()->has('price_min')) {
																    $price_min = request('price_min');
																} else {
                                                                    $price_min = $current_cat->products->pluck('product_price_after_discount')->min();
																}
															?>
															value="{{ $price_min }}" >
												</div>
												<div class="col-md-6">
													<input
															type="text"
															name="price_max"
															id=""
															class="form-control"
															placeholder="max"
															<?php
																if(request()->has('price_max')) {
																	$price_max = request('price_max');
																} else {
                                                                    $price_max = $current_cat->products->pluck('product_price_after_discount')->max();
																}
                                                            ?>
															value="{{ $price_max }}" >
												</div>
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn-sm btn btn-block btn-primary">Submit</button>
										</div>
									</div>
								</div>
							</div>
							{{-- Price Filter End --}}




							<!--Single Filter area-->
							{{-- Color Filter --}}
								<div class="single-filter-items">
								<div class="heading" id="headingTwo">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
											Colour
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse {{ request('color') ? 'show' : '' }}" aria-labelledby="headingTwo"
									data-parent="#filter-bar">
									<div class="card-body">


                                        <?php
											$product_measurement_details =  $current_cat
												->products
												->pluck('product_measurement_details')
												->filter(function($single_item){

													if($single_item != "null") {
														return $single_item;
													}
												})
												->map(function($item){
													return json_decode($item, true);
												});
											$color_name = Arr::pluck($product_measurement_details, 'color_name');
											$color_name = array_unique(Arr::collapse($color_name));
                                        ?>
										@foreach($color_name as $color)
												<div class="form-group form-check form-check">
													<label class="form-check-label" style="cursor: pointer">
														<?php
															$is_color_checked = false;
															if(request('color')) {
                                                                $is_color_checked = true;
															}
														?>
														<input class="form-check-input"
															   type="radio"
															   name="color"
															   id=""
															   value="{{ $color }}"
															   style="margin-top: 1px;"
															   {{ request('color') === $color ? 'checked' : '' }}

														>
														<span style="background: {{ $color }};width: 41px;height: 15px;text-indent: -1000px;display: inline-block;border-radius: 3px;">{{ $color }}</span>
													</label>
												</div>
										@endforeach


											<div class="form-group">
												<button type="submit" class="btn-sm btn btn-block btn-primary">Submit</button>
											</div>
										
									</div>
								</div>
							</div>
							{{-- Color Filter End--}}



							<!--Single Filter area-->
							{{-- Size Filter Start--}}
							<div class="single-filter-items">
								<div class="heading" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
											Size
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse {{ request('size') ? 'show' : '' }}" aria-labelledby="headingThree"
									data-parent="#filter-bar">
									<div class="card-body">
                                        <?php
											$sizes = Arr::pluck($product_measurement_details, 'size');
											$sizes = array_unique(Arr::collapse($sizes));
                                        ?>
										@foreach($sizes as $size)
											<div class="form-group form-check form-check">
												<label class="form-check-label">
													<input
															class="form-check-input"
															type="radio"
															name="size"
															id=""
															value="{{ $size }}"
															{{ request('size') === $size ? 'checked' : '' }}
													>
													{{ $size }}
												</label>
											</div>
										@endforeach


										<div class="form-group">
											<button type="submit" class="btn-sm btn btn-primary btn-block">Submit</button>
										</div>
									</div>
								</div>
							</div>
							{{-- Size Filter End--}}


						</div>
						</form>
					</div>


					@if(request()->has('filter'))
						<div class="col-lg-9 right-side-product-area">
							<?php
								$product = $current_cat->products;
								if(request()->has('price_min') || request()->has('price_max')) {
                                    $product = $product->filter(function($pro){
										return (
											( $pro->product_price_after_discount >= request('price_min') ) &&
											( $pro->product_price_after_discount <= request('price_max')  )
										);
									});
								}

								if(request()->has('size')) {
                                    $product = $product->filter(function($pro){
									    return strpos($pro->product_measurement_details, request('size'));
									});
								}

								if(request()->has('color')) {
                                    $product = $product->filter(function($pro){
                                        return strpos($pro->product_measurement_details, request('color'));
									});
								}
								if( request()->has('sortBy') && ( request('sortBy') === 'low_price' ) ) {
                                    $product = $product->sortBy('product_price_after_discount');
								} elseif ( request()->has('sortBy') && ( request('sortBy') === 'high_price' ) ) {
                                    $product = $product->sortByDesc('product_price_after_discount');
								} elseif ( request()->has('sortBy') && ( request('sortBy') === 'newest_first' ) ) {
                                    $product = $product->sortByDesc('updated_at');
								}


//								dd( $product->pluck('product_price_after_discount', 'created_at'), $sizes);

							?>

								<div class="row">
									<div class="col-md-6">
										<h2 class="page-name">{{$current_cat->title}}</h2>
									</div>
									<div class="col-md-6">
										<h4 class="product-show-detals">showing <span>1 - 30</span> of <span>146 matches</span></h4>
									</div>
								</div>
								<div class="row short-name-area">
									<div class="col-md-6 short-type">
										<span>sort By</span>
										<select name="sortBy" id="" form="product_filter_form">
											<option value="newest_first" @if(request('sortBy') === 'newest_first') selected @endif>Newest First</option>
											<option value="low_price" @if(request('sortBy') === 'low_price') selected @endif>Low Price</option>
											<option value="high_price" @if(request('sortBy') === 'high_price') selected @endif>High Price</option>
										</select>
										<button type="submit" class="btn btn-light btn-sm" form="product_filter_form">Select</button>
									</div>
									<div class="col-md-6 text-right short-type">
										<span>sort By</span>
										<select name="shornum" id="">
											<option value="9">9</option>
											<option value="12">12</option>
											<option value="30">30</option>
										</select>
									</div>
								</div>
								<div class="row product-catagory-list">
									<!--Single Product Items-->
									@if($product->count())
										@foreach($product as $product)
											<div class="col-md-4">
												<div class="single-product">
													<span class="top-pup">Sale</span>
													@if(trim($product->product_thumbnail, "\"") === 'nothumbnail.jpg')
														<a href="/product/{{$product->id}}"><img src="https://via.placeholder.com/468x480?text=No+Image+Found"></a>
													@else
														<a href="/product/{{$product->id}}"><img src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}"></a>
													@endif
													<h4 class="web-name">Keedo</h4>
													<h4 class="product-name"><a href="/product/{{$product->id}}">{{$product->product_title}}</a></h4>
													<h3 class="price"><del>BDT{{$product->product_price}}</del><ins> BDT{{$product->product_price_after_discount}}</ins></h3>
												</div>
											</div>
										@endforeach
									@else
											<div class="col-md-4 m-auto" style="height: 500px;">
												<h2 style=" margin-top: 100px">No product found</h2>
											</div>
									@endif
								</div>
						</div>
					@endif


					{{-- Product Area --}}
					@if(!request()->has('filter'))
				<div class="col-lg-9 right-side-product-area">
						<div class="row">
							<div class="col-md-6">
								<h2 class="page-name">{{$current_cat->title}}</h2>
							</div>
							<div class="col-md-6">
								<h4 class="product-show-detals">showing <span>1 - 30</span> of <span>146 matches</span></h4>
							</div>
						</div>
						<div class="row short-name-area">
							<div class="col-md-6 short-type">
								<span>sort By</span>
								<select name="sortBy" id="" form="product_filter_form">
									<option value="newest_first" @if(request('sortBy') === 'newest_first') selected @endif>Newest First</option>
									<option value="low_price" @if(request('sortBy') === 'low_price') selected @endif>Low Price</option>
									<option value="high_price" @if(request('sortBy') === 'high_price') selected @endif>High Price</option>
								</select>
								<button type="submit" class="btn btn-light btn-sm" form="product_filter_form">Select</button>
							</div>
							<div class="col-md-6 text-right short-type">
								<span>sort By</span>
								<select name="shornum" id="">
									<option value="9">9</option>
									<option value="12">12</option>
									<option value="30">30</option>
								</select>
							</div>
						</div>
						<div class="row product-catagory-list">
							<!--Single Product Items-->
							@foreach($categoy_products as $product)
							<div class="col-md-4">
								<div class="single-product">
									<span class="top-pup">Sale</span>
									@if(trim($product->product_thumbnail, "\"") === 'nothumbnail.jpg')
										<a href="/product/{{$product->id}}"><img src="https://via.placeholder.com/468x480?text=No+Image+Found"></a>
									@else
										<a href="/product/{{$product->id}}"><img src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}"></a>
									@endif
									<h4 class="web-name">Keedo</h4>
									<h4 class="product-name"><a href="/product/{{$product->id}}">{{$product->product_title}}</a></h4>
									<h3 class="price"><del>BDT{{$product->product_price}}</del><ins> BDT{{$product->product_price_after_discount}}</ins></h3>
								</div>
							</div>
							@endforeach
						</div>
					@endif
				</div>
					@endif














			</div>
		</div>
	</section>

@endsection('content-section')
