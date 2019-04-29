
<?php $get_pro_tour=\DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>config('app.web')])
        ->inRandomOrder()
        ->limit(5)
        ->orderBy('pro.province_order', 'DESC')
        ->get(); ?>
<div class="container-fluid hidden-xs" id="menu-header-top">
    <ul class="nav navbar-nav">
      	<li><a href="javascript:void(0)"><i class="fa fa-phone"></i>&nbsp;+95 (9) 401 533 484  </a></li>
      	<li><a href="javascript:void(0)"><i class="fa fa-envelope-o"></i>&nbsp; info@cyclingburma.com </a></li>
    </ul>
</div>
<!-- add new menu --> 
	
  <div class="mtopnav" style="" id="mymenu" style="display: none;" >
  	<a href="{{url('/')}}" title="{{config('app.title')}}" style="background-color:#00b7f1;">
    <img class="mylogotop" src="{{url('/')}}/img/cyclingburmar.png" style="" >
		  	</a>
  <a href="{{url('/')}}" class="mytop" style="">Home</a>
  <div class="mydropdown" style=" ">
    <button class="mydropbtn">Where to Go 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="mydropdown-content">
    	@foreach($get_pro_tour as $pro)
      <a href="{{route('getDest')}}?location={{$pro->slug}}">{{$pro->province_name}}</a>
     	   @endforeach
     	   <a href="{{route('getDest')}}">View More &nbsp<i class="fa fa-angle-double-right"></i></a>
    </div>
  </div> 
  <a href="{{route('getActivity')}}" >Our Activities</a>
  <a href="{{route('getContact')}}">Contact Us</a> 
</div>



<div id="main-menu"  >
	<nav class="navbar navbar" id="menu-nav">

		<div id="logo">
			<a href="{{url('/')}}" title="{{config('app.title')}}">
			  	<img class="mylogo" src="{{url('/')}}/img/cyclingburmar.png" >
		  	</a>
	  	</div >
	  	<center>
			<div class="containe-fluid">		
			    <div class="navbar-header" >	
					<div class="icon-bar">
					 <button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		  	<i class="glyphicon glyphicon-menu-hamburger" ></i></button>
					</div>
				</div>
			</div>
		</center>

		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav" id="nav-ul" >
			    	<li><a href="{{url('/')}}">Home</a></li>
			        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#services">Where to Go</a>
			        	<ul class="dropdown-menu" id="sub-menu">
			        		<span id="triangle-point"></span>
				        	@foreach($get_pro_tour as $pro)
				        		<li><a href="{{route('getDest')}}?location={{$pro->slug}}">{{$pro->province_name}}</a></li>
				        	@endforeach
				        	<li><a href="{{route('getDest')}}"><small class="btn btn-primary btn-sm btn-block">View More <i class="fa fa-angle-double-right"></i></small></a></li>
				        </ul>
			        </li>
			        <li><a href="{{route('getActivity')}}">Our Activities</a></li>		       
			        <li><a href="{{route('getContact')}}">Contact Us</a> </li>		        
			    </ul>		   
		    </div>


	</nav>
 <!--  -->
<script type="text/javascript">
	
	window.onscroll = function() {scrollFun()};

function scrollFun() {
  if (document.body.scrollTop > 270 || document.documentElement.scrollTop > 270) {
    document.getElementById("mymenu").style.display = "block";
  } else {
    document.getElementById("mymenu").style.display = "none";
  }
}

</script>
</div>
