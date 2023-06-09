@extends('website.layouts.layout')
@section('title', 'Smart Hostel | Gallery')
@section('content')
<section class="parallax-effect">
  <div id="parallax-pagetitle" style="background-image: url({{asset('custom/website/images/parallax/parallax-01.jpg')}});">
    <div class="color-overlay"> 
      <!-- Page title -->
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li class="active">Gallery</li>
            </ol>
            <h1>Gallery</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Filter -->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-pills" id="filters">
        <li class="active"><a href="#" data-filter="*">All</a></li>
        <li><a href="#" data-filter=".rooms">Rooms</a></li>
        <li><a href="#" data-filter=".restaurant">Restaurant</a></li>
        <li><a href="#" data-filter=".pool">Swimming Pool</a></li>
        <li><a href="#" data-filter=".business">Business</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- Gallery -->
<section id="gallery" class="mt50">
  <div class="container">
    <div class="row gallery"> 
      <!-- Image 1 -->
      <div class="col-sm-3 restaurant fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/1.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/1.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 2 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/2.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/2.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 3 -->
      <div class="col-sm-3 restaurant fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/3.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/3.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 4 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/4.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/4.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 5 -->
      <div class="col-sm-3 business fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/5.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/5.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 6 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/6.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/6.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 7 -->
      <div class="col-sm-3 business fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/7.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/7.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 8 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/8.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/8.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 1 -->
      <div class="col-sm-3 restaurant fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/9.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/9.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 2 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/10.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/10.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 3 -->
      <div class="col-sm-3 rooms fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/11.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/11.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
      <!-- Image 4 -->
      <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="{{asset('custom/website/images/gallery/12.jpg')}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset('custom/website/images/gallery/12.jpg')}}" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
    </div>
  </div>
</section>

<!-- Call To Action -->
<section id="call-to-action" class="mt100">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <h2>This is a Call to Action! Need a hotel/resort/inn template?</h2>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        <a href="http://themeforest.net/item/starhotel-responsive-hotel-booking-template/7784956" target="_blank" class="btn btn-default btn-lg pull-right">Purchase hotel template</a>
      </div>
    </div>
  </div>
</section>
@endsection 