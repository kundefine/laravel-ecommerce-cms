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
	<link rel="stylesheet" type="text/css" href="{{asset('fontend/assets/css/main.css')}}" />
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
</head>

<body>
	<!--Start Header Area
===================================-->
	@include('fontend.inc.header')
	<!--End Header Area
===================================-->

	<!--Start Home Area
===================================-->
    {{-- Home Content --}}
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

	<script>

		
		$(document).ready(function(){
			var singleProduct = {!! json_encode( $product->getOriginal() ) !!};
			


        	console.log(singleProduct);

			$('#add_to_cart-k').click(function(e){
				e.preventDefault();
				singleProduct.quantity = $('#product_q_plus').val();
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
					},
					type: 'POST',
					url: '{{ url("/add_to_cart") }}',
					data: {productData: singleProduct},
					success: function (data){
						console.log(data);
						
					},
					error: function(e) {
						console.log("some error occur");
					}
				});
			});
		});
        
    </script>
</body>

</html>