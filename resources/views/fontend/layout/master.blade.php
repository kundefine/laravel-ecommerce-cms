<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href={{asset("assets/img/favicon.png")}}>
	<!-- Author Meta -->
	<meta name="author" content="rjshikto">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Site Title -->
	<title>InboxKidz</title>
	<!--Main Css 1.0-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnify/2.3.2/css/magnify.min.css" />
	<link rel="stylesheet" type="text/css" href="{{asset('fontend/assets/css/main.css')}}" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
	@yield('css')
</head>

<body>

	<!--Start Cart Item
===================================-->
	@include('fontend.inc.cart-item')
	<!--End Cart Item
===================================-->

	<!--Start Header Area
===================================-->
	@include('fontend.inc.header')
	<!--End Header Area
===================================-->

	<!--Start Home Area
===================================-->
    {{-- Home Content --}}
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('admin.inc.alert-message')
			</div>	
		</div>
	</div>

	@yield('content-section')

	
    
    
	<!--End Home Area
===================================-->


	<!--Start Footer Area
===================================-->
    @include('fontend.inc.footer')
	<!--End Footer Area
===================================-->


	<!--First jQuery Js, then proper Js, then Bootstrap and others-->
	<!--Modernizr-->
	<script src={{asset("fontend/assets/js/modernizr-3.6.0.min.js")}}></script>
	<!--jQuery Js-->
	<script src={{asset("fontend/assets/js/jquery-3.3.1.min.js")}}></script>
	<!--Proper Js-->
	<script src={{asset("fontend/assets/js/propper.js")}}></script>
	<!--Bootstrap 4.1.3-->
	<script src={{asset("fontend/assets/js/bootstrap.min.js")}}></script>
	<!--Uikit Js-->
	<script src={{asset("fontend/assets/js/uikit.min.js")}}></script>
	<script src={{asset("fontend/assets/js/uikit-icons.min.js")}}></script>
	<!--Custom Js-->
	<script src={{asset("fontend/assets/js/custom.js")}}></script>
	<script src={{asset("fontend/assets/js/k-cart.js")}}></script>
	<script>

	$(document).ready(function(){


		$('#full-cart-button').click(function(e){
			e.preventDefault();
			$('div#cart-item-list').addClass('cart-show');
		});
		$('#close-cart').click(function(e){
			e.preventDefault();
			$('div#cart-item-list').removeClass('cart-show');
		});

		$('#clear-cart').click(function(e){
			e.stopPropagation();
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
				},
				type: 'POST',
				url: '{{ url("/clear_cart") }}',
				data: {clearCart: "clear the cart"},
				success: function (data){
					console.log("cart has been clear");
					console.log(data)
					$('#cart-total-item').html(0);
					$('#add-cart-item').html(``);
					
				},
				error: function(e) {
					console.log("some error occur");
				}
			});
		});


		$('#checkout').click(function(e){
			e.stopPropagation();
		});

		$(document).on("click", "i.remove-cart", function(e){
			var removeCartElement = e.target.parentElement.parentElement;
			var cartItem = document.getElementById('add-cart-item');
			cartItem.removeChild(removeCartElement);
			let id = this.id;
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
				},
				type: 'POST',
				url: '{{ url("/remove_cart_item") }}',
				data: {id: id},
				success: function (data){
					console.log(data);
					$('#cart-total-item').html(data.totalCart);
				},
				error: function(e) {
					console.log("some error occur");
				}
			});
		})
		
	});
		
	</script>

	@yield('push-script')

	


</body>

	

</html>