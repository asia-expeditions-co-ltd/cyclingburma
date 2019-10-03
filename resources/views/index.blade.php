
@extends('layout.app')

@section('title', '')

@section('keywords', 'Cycling Burma, Cycling Myanmar, Biking in Myanmar, Cycling Yangon, Cycling Bagan, Irrawaddy dolphin')

@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')



<?php

use App\component\Content;

?>

@section('content')

@include('widgets.menudemo')



@include('widgets.slide_show1')

<div class="container">

	<div class="col-md-12">

		<div class="section-welcome">

			&nbsp;<span class="fa fa-map-pin" style="color: green; font-size: 27px;"></span> &nbsp; JOIN WITH US TO GET NEW UPDATE  

		</div>	

    </div>

</div>

<div class="container">

	
	@include('widgets.tour_package')

</div>

<div style="margin-top: 50px;"></div>

<div class="title-section">

	<div class="container">

		<div class="col-mg-12">

			@include('widgets.popdest')

		</div>

	</div>

</div>

<!-- our activities  -->

<div class="">

	<div class="container">

		<div class="col-mg-12" style="margin-top: 20px;">

			@widget('our_activities')			

		</div>

	</div>

</div>




@include('include.footer')

@endsection