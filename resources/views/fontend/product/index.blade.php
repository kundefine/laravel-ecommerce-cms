@extends('fontend.layout.master')




@section('content-section')
    

    <section class="product_order">
        <div class="listings-title">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 wrap-title">
                        <ul class="title_breadcrumb">
                        <?php $product_cat = $product->category()->get()->first(); ?>
                            <li><a href="/">Home</a></li>
                            <li><a href="/category/{{$product_cat->id}}" class="active">{{$product_cat->title}}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 entry-title text-right">
                        <a href="/category/{{$product_cat->id}}">
                            <h1>{{$product_cat->title}}</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Order Confirmation area-->
        <div class="container">
            <div class="order-confirmation">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="order-image img-responsive">
							@if(trim($product->product_thumbnail, "\"") === 'nothumbnail.jpg')
								<img class="zoom k-thumbnail"
                                    src="https://via.placeholder.com/468x480?text=No+Image+Found"
                                    data-magnify-src="https://via.placeholder.com/468x480?text=No+Image+Found"  
                                />
							@else
								<img 
                                    class="zoom k-thumbnail"         
                                    src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}"
                                    data-magnify-src="/product_images/product_{{$product->id}}/{{trim($product->product_thumbnail, "\"")}}"
                                />
							@endif
                        </div>
						<div class="product-images">
						
							@if($product->product_images != 'null')
								@foreach (json_decode($product->product_images) as $singleProImg )
									<img src="/product_images/product_{{$product->id}}/{{$singleProImg}}" alt="">
								@endforeach
							@else

							@endif
						</div>
                    </div>
                    <div class="col-lg-5 product_payment-area">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="pnamecirdsmall">
                                    <h2>{{$product->product_title}}</h2>
                                    <small> By The Soumi's Can Product </small>
                                    <p class="cardpri">BDT {{$product->product_price_after_discount}}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-4 code-area">
                                <ul class="stocknum12">
                                    <li class="color">Code</li>
                                    <li>baby-{{$product->id}}</li>
                                </ul>
                                <ul class="stocknum">
                                    <li class="color stock">Stock</li>
                                    <li>{{$product->product_stock == 1 ? "Yes" : "No"}}</li>
                                </ul>
                            </div>
                            <div class="col-md-6 payment-method">
                                <h3 class="payment-methods-heading">Payment Methods</h3>
                                <p class="freeora1">Card/Cash on delivery</p>
                                <p class="freeora1">bKash/Online payment</p>
                            </div>

                            <div class="col-md-6 payment-security-guarenteed">
                                <h3 class="payment-security-guarenteed-heading"><span class="fas fa-lock"></span>
                                    payment-security-guarenteed-heading</h3>
                                <img src={{asset("fontend/assets/img/payment-icon.jpg")}} class="payment-security-guarenteed-img">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mesurment-info">

                            @if($product->product_measurement_details != 'null')
									
								@foreach (json_decode($product->product_measurement_details) as $ass => $arr )
                                    <ul>Available {{str_replace("_", " ", $ass)}}</ul>
                                    <div class="product-attr">
                                        @foreach ( $arr as $val )
                                        <button class="btn btn-sm btn-primary" style="background: {{$ass == "color_name" ? $val : ''}}">
                                            {{$val}} <span class="badge badge-success"></span>
                                        </button>
                                        
                                        @endforeach
                                    </div>
                                    <br>
								@endforeach
							@else

							@endif

                                    

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="contact_for_order">
                                    <span class="fas fa-phone"></span>
                                    <h3>call for order</h3>
                                    <p>+88 02 - 9611362</p>
                                    <p>+88 01755 - 732205</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 order-count">
                                <button uk-icon="icon: minus" onclick="subQuantity()"></button>
                                <input id="product_q_plus" type="text" class="product_count_amount" value="1">
                                <button uk-icon="icon: plus" onclick="addQuantity()"></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 product_action">
                                <a href="#" id="add_to_cart-k" class="butn_action"><span class="fas fa-shopping-cart"></span> Add to
                                    cart</a>
                                <a href="#" class="butn_action"><span class="fas fa-taka-sign"></span>Tk. buy now</a>
                                <a href="#" class="butn_action"><span class="fas fa-random"></span> Add to whishlist</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 share-links">
                                <span>share on:</span>
                                <a href="#" class="share_butn facebook">
                                    <fas class="fab fa-facebook-f"></fas>
                                </a>
                                <a href="#" class="share_butn twitter">
                                    <fas class="fab fa-twitter"></fas>
                                </a>
                                <a href="#" class="share_butn linkedin">
                                    <fas class="fab fa-linkedin-in"></fas>
                                </a>
                                <a href="#" class="share_butn google">
                                    <fas class="fab fa-google-plus"></fas>
                                </a>
                                <a href="#" class="share_butn pinterest">
                                    <fas class="fab fa-pinterest-p"></fas>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Delivery Area-->
                    <div class="col-lg-3 delivary-area">
                        <div class="single-tabs delivary">
                            <h3>Delivered In:</h3>
                            <h4><span class="fas fa-map-marker-alt"></span>Inside Dhaka City</h4>
                            <p>2-3 Working Days</p>
                            <h4><span class="fas fa-map-marker-alt"></span>Outside Dhaka City</h4>
                            <p>4-5 Working Days</p>
                        </div>
                        <div class="single-tabs home">
                            <h4><span class="fas fa-home"></span>Home Delivary</h4>
                            <h4><span class="fas fa-handshake"></span>Cash on delivary</h4>
                        </div>
                        <div class="single-tabs">
                            <h3>Return & Warranty: </h3>
                            <h4><span class="fas fa-undo"></span> 7 Day Free Shipping Return</h4>
                        </div>
                        <div class="single-tabs cost">
                            <h3>Delivery Cost:</h3>
                            <h4><span class="fab fa-telegram-plane"></span> Inside Dhaka: 70</h4>
                            <h4><span class="fab fa-telegram-plane"></span> Outside Dhaka: 100</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Description-->
            <div class="product-description">
                <h2>Product Full Description</h2>
                {!!$product->product_discription!!}
            </div>


            <!--Product rating-->
            <div class="rating_review">
                <h2>Ratings & Reviews</h2>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product-rating">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="ratings_title">Product Ratings</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 total-ratings">
                                    <h2>3.24<span>/5</span></h2>
                                    <div class="ratings">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star-half-alt"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <h5>(total Ratings <span>17</span>)</h5>
                                </div>
                                <div class="col-6 count-ratings">
                                    <div class="single-ratings">
                                        <span class="num">5</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">4</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">3</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">2</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">1</span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="shop-rating">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="ratings_title">Shop Ratings</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 total-ratings">
                                    <h2>3.24<span>/5</span></h2>
                                    <div class="ratings">
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star-half-alt"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <h5>(total Ratings <span>17</span>)</h5>
                                </div>
                                <div class="col-6 count-ratings">
                                    <div class="single-ratings">
                                        <span class="num">5</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">4</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">3</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">2</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                    <div class="single-ratings">
                                        <span class="num">1</span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-views">
                    <h2 class="reviewsViewTitle">Reviews</h2>
                    <div class="reviewsbox">
                        <div class="noviews">
                            <span class="iconNoviews far fa-sad-tear"></span>
                            <h5>sorry ! No Reviews Found</h5>
                        </div>
                    </div>
                </div>
                <div class="reviews-form">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <form class="reviewsBox" action="#">
                                <h2>Your Review <span>Help us to improve product Quality</span></h2>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="message">Your Comment</label>
                                        <textarea name="message" id="message" cols="30" rows="2"
                                            class="form-control textarea" placeholder="Message..."></textarea>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="name">Your Name</label>
                                        <input type="text" id="name" class="form-control" placeholder="Name">
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label for="email">Your Email</label>
                                        <input type="text" id="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-12">
                                        <button class="submit_btun" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    @section('push-script')

        <script>
        function addQuantity() {
                let x = document.getElementById('product_q_plus'); 
                let y = parseInt(x.value) + 1;
                x.value = y;
            }

            

            function subQuantity() {
                let x = document.getElementById('product_q_plus');
                let intx = parseInt( x.value );
                let y = intx <= 1 ?  x.value  : intx - 1;
                x.value = y;
            }


String.prototype.trimLeft = function(charlist) {
    if (charlist === undefined)
      charlist = "\s";
  
    return this.replace(new RegExp("^[" + charlist + "]+"), "");
  };

  String.prototype.trimRight = function(charlist) {
    if (charlist === undefined)
      charlist = "\s";
  
    return this.replace(new RegExp("[" + charlist + "]+$"), "");
  };


  String.prototype.trim = function(charlist) {
    return this.trimLeft(charlist).trimRight(charlist);
  };

        </script>


        <script>
            $(document).ready(function(){
                // give cart info feedback
                function cartInfo(message) {
                    $('#cart-info').html(message);
                    $('#cart-info').css('transform' , ' translate(0%, -50%)');
                    setTimeout(function(){ $('#cart-info').css('transform' , ' translate(-100%, -50%)'); }, 2500);
                }


                var singleProduct = {!! json_encode( $product->getOriginal() ) !!};
                console.log("myProduct", singleProduct);
                console.log("myProduct", JSON.parse(singleProduct.product_measurement_details).size);
                let color_name = JSON.parse(singleProduct.product_measurement_details).color_name;
                let size = JSON.parse(singleProduct.product_measurement_details).size;

                $('#add_to_cart-k').click(function(e){

                    e.preventDefault();

                    $('html, body').animate({scrollTop:0}, '300');
                    singleProduct.quantity = $('#product_q_plus').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                        },
                        type: 'POST',
                        url: '{{ url("/add_to_cart") }}',
                        data: {productData: singleProduct},
                        success: function (data){
                            
                            if( data.cartItemExits === true ) {
                                console.log('already added');
                                cartInfo("Already added to your cart");
                                let currentCart = $(`tr#single-cart-item-${data.added_product.id}`);
                                let product_thumbanil = `<img src="https://via.placeholder.com/468x480?text=No+Image+Found">`;
                                console.log("update cart response", data.added_product);
                                let color_data = `<option value=${null}>Select One</option>`;
                                let size_data = `<option value=${null}>Select One</option>`;
                                if( ( (data.added_product.thumbnail).trim("\"") ) != 'nothumbnail.jpg' ) {
                                    product_thumbanil = `<img src="/product_images/product_${data.added_product.id}/${(data.added_product.thumbnail).trim("\"")}">`;
                                }

                                if(color_name) {
                                    color_name.map(function(color){
                                        color_data += `<option value="${color}">${color}</option>`
                                    });
                                }

                                if(size) {
                                    size.map(function(size){
                                        size_data += `<option value="${size}">${size}</option>`
                                    });
                                }


                                currentCart.html(
                                    `
                                        <td>baby-${data.added_product.id}</td>
                                        <td class="cart-thumbnail">${product_thumbanil}</td>
                                        <td>${data.added_product.name}</td>
                                        <td>${data.added_product.price}</td>
                                        <td>
                                            <input min="1" class="quantityChange" type="number" name="quantity" quantitychange="${data.added_product.id}" value="${data.added_product.quantity}">
                                        </td>


                                        <td>
                                            <select class="colorChange" name="" required form="quick-buy-form" colorchange="${data.added_product.id}"> 
                                                ${color_data}
                                            </select>
                                        </td>
                                        <td>
                                            <select class="sizeChange" name="" required form="quick-buy-form" sizechange="${data.added_product.id}"> 
                                                ${size_data}
                                            </select>
                                        </td>


                                        <td class="totalPrice">${(data.added_product.total_price).toFixed(2)}</td>
                                        <td class="cart-remove" style="cursor: pointer;"><i id="${data.added_product.id}" class="fas fa-trash remove-cart"></i></td>
                                    `
                                )
                            } else {
                                console.log("cart item added");
                                console.log("newly added cart response", data.added_product);
                                let product_thumbanil = `<img src="https://via.placeholder.com/468x480?text=No+Image+Found">`;
                                if( ( (data.added_product.thumbnail).trim("\"") ) != 'nothumbnail.jpg' ) {
                                    product_thumbanil = `<img src="/product_images/product_${data.added_product.id}/${(data.added_product.thumbnail).trim("\"")}">`;
                                }
                                let color_data = `<option value=${null}>Select One</option>`;
                                let size_data = `<option value=${null}>Select One</option>`;
                                if(color_name) {
                                    color_name.map(function(color){
                                        color_data += `<option value="${color}">${color}</option>`
                                        console.log('working');
                                    });
                                }

                                if(size) {
                                    size.map(function(size){
                                        size_data += `<option value="${size}">${size}</option>`
                                    });
                                }

                                $('#cart-total-item').html(data.totalCart);
                                $('#add-cart-item').append(`<tr class="single-cart-item" id="single-cart-item-${data.added_product.id}">
                                    <td>baby-${data.added_product.id}</td>
                                    <td class="cart-thumbnail">${product_thumbanil}</td>
                                    <td>${data.added_product.name}</td>
                                    <td>${data.added_product.price}</td>
                                    <td class="cart_quantity">
                                        <input min="1" class="quantityChange" type="number" name="quantity" quantitychange="${data.added_product.id}" value="${data.added_product.quantity}">
                                    </td>
                                    <td>
                                        <select class="colorChange" name="" required form="quick-buy-form" colorchange="${data.added_product.id}"> 
                                            ${color_data}
                                        </select>
                                    </td>
                                   <td>
                                        <select class="sizeChange" name="" required form="quick-buy-form" sizechange="${data.added_product.id}"> 
                                            ${size_data}
                                        </select>
                                    </td>

                                    <td class="totalPrice">${(data.added_product.total_price).toFixed(2)}</td>
                                    <td class="cart-remove" style="cursor: pointer;"><i id="${data.added_product.id}" class="fas fa-trash remove-cart"></i></td>
                                </tr>`);
                                cartInfo("Your Item has been added successfully");
                            }
                            
                        },
                        error: function(e) {
                            console.log("some error occur");
                        }
                    });
                });

                
            });
        </script>




        {{-- Product Zooming functionality --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.2/js/jquery.magnify.min.js"></script>
        <script>
            var $zoom = null;
            $(document).ready(function(){
                $('.product-images img').click(function(e){
                    $('.product-images img').removeClass('active');
                    $(this).addClass('active');
                    $('.k-thumbnail').attr('src', e.target.src);
                    $('.k-thumbnail').attr('data-magnify-src', e.target.src);
                    $('.magnify-lens').attr('style', 'background: url('+ e.target.src +') no-repeat');
                    $zoom.destroy();
                    $zoom = $('.zoom').magnify();
                });
                $zoom = $('.zoom').magnify();
                $zoom.destroy();
            });
        </script>

        

    @endsection
    
@endsection('content-section')