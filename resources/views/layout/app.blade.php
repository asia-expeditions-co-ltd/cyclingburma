<!DOCTYPE html>
<html >
<head>
	<!--   <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
  <meta property="og:type"          content="http://takemetoburma.com" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description " />
  <meta property="og:image"         content="http://takemetoburma.com/img/demo-logo.png" /> -->

	<meta charset="utf-8">
 

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/peoplegolf.png" type="image/x-icon" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">        
	<title>@yield('title') | {{config('app.title')}}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
  <script type="text/javascript" src="{{ asset('js/lib/jquery-3.3.1.min.js')}}"></script>


  <!-- Libraries CSS Files -->
  <link href="{{asset('/add_lib/lib/animate/animate.min.css')}}" rel="stylesheet"> <!-- for action slow -->
  <link href="{{asset('/add_lib/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('/add_lib/css/style.css')}}" rel="stylesheet">	
  <script type="text/javascript" src="{{ asset('js/custom.js')}}"></script>  





</head>
<body>
	
	@yield('content')
  <script src="{{asset('/add_lib/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('/add_lib/lib/isotope/isotope.pkgd.min.js')}}"></script>  
  <script src="{{asset('/add_lib/lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <script src="{{asset('/add_lib/js/main.js')}}"></script>
	
 <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
</body>
</html>