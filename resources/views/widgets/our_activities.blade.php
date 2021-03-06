<?php 
	use App\component\Content;
	$getNews = \App\Events::where('status',1)->orderBy('id', 'DESC')->get();
?>
<div class="col-md-6">
	<div id="carousel-example-news" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators item-point">
			@foreach($getNews as $key => $icon)
				<li data-target="#carousel-example-news" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active':''}}"></li>
			@endforeach			
		</ol>
		<div class="carousel-inner">
			@foreach($getNews as $key => $new)
			<div class="item {{$key == 0 ? 'active':''}}">
				<img style="width: 100%; margin-top: 40px;" src="{{Content::urlImage($new->photo)}}" alt="{{$new->tittle}}">
				<div class="carousel-caption">
					<a href="{{route('singleActivity', ['slug' => $new->slug])}}"><h5>{{$new->title}}</h5></a>
				</div>
			</div>			
			@endforeach
		</div>	
		<a class="left carousel-control slideCarousel" href="#carousel-example-news" data-slide="prev"></a>
		<a class="right carousel-control slideCarousel" href="#carousel-example-news" data-slide="next"></a>		
	</div>
</div>
<div class="col-md-6">
	<h1 style="margin-top: 30px;" ><strong>Our Activities</strong></h1>
	<h6 style="color: #7e9d10!important;"></h6>
	<div><p>Cycling provide numerous benefits in comparison with motor vehicles, including the sustained physical exercise involved in cycling, easier parking, increased maneuverability, and access to roads, bike paths and rural trails.</p></div><br>
	<!-- <ul class="list-unstyled liststyle-li"> 
		<li><i class="fa fa-check-circle-o"></i> No daily water usage</li>
		<li><i class="fa fa-check-circle-o"></i> Not affected by freezing weather</li>
		<li><i class="fa fa-check-circle-o"></i> 3 Distinct golf fields surface speed-of-play options</li>
		<li><i class="fa fa-check-circle-o"></i> Adjustable golf field speeds that are great for serves</li>
	</ul> -->
</div>	
