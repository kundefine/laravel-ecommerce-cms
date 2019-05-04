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
                {{-- Category filter --}}
				@if(empty($categoy_products))
					<div class="col-md-4 m-auto" style="height: 500px;">
						<h2 style=" margin-top: 100px">No product found</h2>
		
					</div>
				@else
				
					<div class="col-lg-3 left-side-bar">
						<div class="filter-section" id="filter-bar">
							<!--Single Filter area-->
							<div class="single-filter-items">
								<div class="heading" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Price
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseOne" class="collapse" aria-labelledby="headingOne"
									data-parent="#filter-bar">
									<div class="card-body">
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
									</div>
								</div>
							</div>
							<!--Single Filter area-->
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
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
									data-parent="#filter-bar">
									<div class="card-body">
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
									</div>
								</div>
							</div>
							<!--Single Filter area-->
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
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree"
									data-parent="#filter-bar">
									<div class="card-body">
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
									</div>
								</div>
							</div>
							<!--Single Filter area-->
							<div class="single-filter-items">
								<div class="heading" id="headingFour">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
											Brands
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour"
									data-parent="#filter-bar">
									<div class="card-body">
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
									</div>
								</div>
							</div>
							<!--Single filter area-->
							<div class="single-filter-items">
								<div class="heading" id="headingFive">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse"
											data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
											Best use
											<span class="icon fas fa-plus"></span>
											<span class="icon fas fa-minus"></span>
										</button>
									</h5>
								</div>
								<div id="collapseFive" class="collapse" aria-labelledby="headingFive"
									data-parent="#filter-bar">
									<div class="card-body">
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
										<div class="single-items">
											<input type="checkbox" value=""> <span>TK0 - TK250 <strong>(86)</strong></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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
								<select name="shorttype" id="">
									<option value="postion">Postion</option>
									<option value="native">Native</option>
									<option value="price">Price</option>
								</select>
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
					{{-- <div class="row justify-content-end">
						<div class="col-lg-10 catagory-bottom">
							<div class="pagination-num">
								<ul class="page-num">
									<li><a href="#" class="active">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
								</ul>
								<div class="next-button">
									<a href="#" class="butn_next">Next</a>
								</div>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</section>

@endsection('content-section')
