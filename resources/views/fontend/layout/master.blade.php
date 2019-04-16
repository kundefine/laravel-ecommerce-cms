<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="assets/img/favicon.png">
	<!-- Author Meta -->
	<meta name="author" content="rjshikto">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
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
	@include('fontend.inc.home-content')
    
    {{-- photo galary --}}
	@include('fontend.inc.photo-galary')
	<!--End Home Area
===================================-->


	<!--Start Footer Area
===================================-->
    @include('fontend.inc.footer')
	<!--End Footer Area
===================================-->


	<!--First jQuery Js, then proper Js, then Bootstrap and others-->
	<!--Modernizr-->
	<script src="fontend/assets/js/modernizr-3.6.0.min.js"></script>
	<!--jQuery Js-->
	<script src="fontend/assets/js/jquery-3.3.1.min.js"></script>
	<!--Proper Js-->
	<script src="fontend/assets/js/propper.js"></script>
	<!--Bootstrap 4.1.3-->
	<script src="fontend/assets/js/bootstrap.min.js"></script>
	<!--Uikit Js-->
	<script src="fontend/assets/js/uikit.min.js"></script>
	<script src="fontend/assets/js/uikit-icons.min.js"></script>
	<!--Custom Js-->
	<script src="fontend/assets/js/custom.js"></script>
</body>

</html>