@extends('layout.app')
@section('title', 'All Destinations')

@section('keywords', isset($cat) ? $cat->meta_keyword : 'Myanmar (Burma) Tour, Travel, Golf')
@section('description', 'Myanmar(Burma) is the good destinations to visit and have lot of golf courses')

<?php 
use App\component\Content; 
    if (isset($prov->province_photo)) {
         $image    = Content::urlImage( $prov->province_photo, '/photos/share/');
        
    }else {
        $image     = 'img/bagan.jpg';
   
    }
?>
@section('content')
@include('widgets.menudemo')


<div style="width:100%; height: 420px;" >
    <div class="item-slide" style="background-image: url(http://takemetoburma.com/photos/share/1548644336-golf_communities.jpg); background-position:center bottom; opacity: 1;">                   
    </div>  
</div>
<div class="clearfix"></div>
<div style=";background: #00b7f1; color: #fff;">
    <div class="container" style="line-height: 40px"><div class="row"> Tours Packages </div></div>
</div>
<div class="container">
    <div class="row" style="margin-top: 22px; margin-bottom: 22px;">
        <div class="col-md-3" style="background-color: #ffffff;">
            <div class="card ">
                <div class="row">
                    <div class="card-header bg-primary text-white text-uppercase" style="line-height: 35px;">  &nbsp;<i class="fa fa-list"></i> Filter Tours</div>
                </div>
                <br>
                <form method="get" action="">
                    <label for="category" style="font-size: 12px;font-weight: 400;">Category</label>
                    <select class="form-control input-sm  textbox_color" id="category" name="cat" onchange="this.form.submit()">
                            <option value="">--select--</option>
                         <?php 
                           $get_cat =\DB::table('tbl_tours as t')
                            ->select(\DB::Raw('cat.id,cat.name as cat_name'))
                            ->groupBy(\DB::raw('(cat.id),(cat.name)'))
                            ->join('category_tour as cat_t', 't.id', '=', 'cat_t.tour_id')
                            ->join('category as cat', 'cat_t.category_id', '=', 'cat.id')
                            ->where('t.status',1)
                            ->get();
                             ?>                           
                        @foreach($get_cat as $cat)
                            <option value="{{$cat->id}}" <?=  isset($_GET['cat']) ? ($_GET['cat']==$cat->id?'selected': '') : '' ?> >{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <label for="tourtype" style="font-size: 12px;font-weight: 400;">Tour Type</label>
                    <select class="form-control input-sm  textbox_color" id="tourtype" name="tour_type" onchange="this.form.submit()">
                        <option value="1" {{ isset($_GET['tour_type']) ? ($_GET['tour_type']==1?'selected': '') : ''}}>Tour Packages</option>
                        <option value="0" {{ isset($_GET['tour_type']) ? ($_GET['tour_type']==0?'selected': '') : ''}}>Tour</option>                        
                    </select>
                    <br>
                    <label for="location" style="font-size: 12px;font-weight: 400;">Destinations</label>
                    <select class="form-control input-sm  textbox_color" id="location" name="location" onchange="this.form.submit()">
                        <option value="">--select--</option>
                 
                             <?php foreach (\DB::table('province as pro')
        ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
        ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
        ->select('pro.*')
        ->groupBy('tour.province_id')
        ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>config('app.web')])
        ->inRandomOrder()
        ->limit(6)
        ->orderBy('pro.province_order', 'DESC')
        ->get() as $geta):?>

            <option value="{{$geta->slug}}" 
            <?=  isset($_GET['location']) ? ($_GET['location']== $geta->slug?'selected': '') : '' ?> >{{$geta->province_name}}
            </option>
             <?php endforeach ?>    
                           </select>
                </form>
                <div class="row">
                    <hr>
                    <h4>Recent Tours</h4>                
                    @if($recentTour)
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:22px;">
                            <div class="carousel-inner">
                                @foreach($recentTour as $key => $tour)
                                    <div class="item {{$key == 0 ? 'active' : ''}}"> 
                                        <div class="row">                                          
                                            <div class="col-sm-12">
                                                @include('include.item_tour')
                                            </div>                                          
                                        </div>
                                    </div>  
                                @endforeach                
                            </div>
                            @if($recentTour->count() > 1 )
                                <div class="controls-slide">
                                    <a id="prev" class="left fa fa-chevron-left btn btn-default" href="#carousel-example-generic"
                                        data-slide="prev"></a>
                                    <a id="next" class="right fa fa-chevron-right btn btn-default" href="#carousel-example-generic" data-slide="next"></a>
                                </div>
                            @endif
                        </div>
                    @endif
                <!-- Recent End -->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-9">

 

 @if(isset($prov->province_photo))
        <div class="col-sm-12">
            <div class="example" >
                <div style="text-align: center;">
                    <img src="{{$image}}"  style="width:70%; height: 300px;" alt="Image">
                </div>
                <div style="font-family: inherit; font-weight: 500; line-height: 1.1; margin-top: 20px;">{!! $prov->province_intro or '' !!}</div>        
            </div>
        </div>
        @else
        <div class="col-sm-12">
            <div class="example" style="margin-top: 0;">
                <div class="row">                        
                    <div class="section-title welcome-section widget-title">
                        <h2><b>All Popurlar Place</b></h2>
                    </div>
                    @foreach(\DB::table('province as pro')
                                ->join('tbl_tours as tour', 'tour.province_id', '=', 'pro.id')
                                ->join('tour_web as tweb', 'tour.id' ,'=', 'tweb.tour_id')
                                ->select('pro.*')
                                ->groupBy('tour.province_id')
                                ->where(['tour.status'=>1,'pro.province_status'=>1,'tour.country_id'=>122,'tweb.web_id'=>config('app.web')])
                                ->orderBy('pro.province_order', 'DESC')
                                ->get(); as $con)
                    <div class="col-sm-4 col-xs-12 golf-club wow fadeInUp animated" data-wow-delay="1s" style="visibility: visible; animation-name: fadeInUp;" >
                        <div class="row"  >
                          <div class="form-group item-tour" style="margin:13px; position: relative;">
                            <span></span>
                            <a href="{{route('getDest')}}?location={{$con->slug}}">
                              <div class="caption" >
                                <h4 ><b>{{$con->province_name}}</b></h4>
                                </div>
                              <img src="{{Content::urlImage($con->province_photo)}}" style="width: 100%; height: 100%; z-index: -2;" >
                            </a>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>                       
        @endif

         <div class="col-sm-12">
            <div class="example">
                <div class="title text-center widget-title"><h2><b>Tour Packages</b></h2></div>
                @if(count($tours) > 0)
                @foreach($tours->chunk(3) as $tourchunk)
                <div class="row" style="margin-bottom: 28px;">
                    @foreach($tourchunk as $tour)
                        <div class="col-xs-12 col-sm-4">
                            @include('include.item_tour')
                        </div>  
                    @endforeach
                </div>
                @endforeach
                <center>
                    {{$tours->links()}}
                </center>
            @else
                <div class="alert alert-warning alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <i class="fa fa-warning (alias)"></i> Look like not found
                </div>                       
            @endif    
             
        </div>
       </div>
               
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".btnSubmit").on("change", function(){
            $('form').submit();
            // alert('hello');
        });
    });
</script>
@include('include.footer')
@endsection