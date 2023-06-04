@extends('website.layouts.layout')
@section('title', 'Smart Hostel | Package List')
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
              <li class="active">Rooms list view</li>
            </ol>
            <h1>Rooms list view</h1>
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
        <li><a href="#" data-filter=".single">Single Room</a></li>
        <li><a href="#" data-filter=".double">Double Room</a></li>
        <li><a href="#" data-filter=".executive">Executive Room</a></li>
        <li><a href="#" data-filter=".apartment">Apartment</a></li>
      </ul>
    </div>
  </div>
</div>

<!-- Rooms -->
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      @foreach(\App\Models\Restaurant\ProductPackage::where('status', '1')->get() as $value)
      <div class="col-sm-4 single">
        <?php 
        if(!empty($value->image)){
        $images = explode('_', $value->image)[0];
          $picture="/upload/product_package/".$images;
        }
        ?>
        <div class="room-thumb"> <img src="{{asset($picture)}}" alt="room 1" class="img-responsive" />
          <div class="mask">
            <div class="main">
              <h5>{{$value->name}}</h5>
              <div class="price">Tk. {{$value->price}}<span>a Package</span></div>
            </div>
            <div class="content">
              <p><span>Package Code: {{$value->package_code}}</span> {{$value->details}}</p>
              <div class="row">
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                    <li><i class="fa fa-check-circle"></i> Private balcony</li>
                    <li><i class="fa fa-check-circle"></i> Sea view</li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                    <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                    <li><i class="fa fa-check-circle"></i> Bathroom</li>
                  </ul>
                </div>
              </div>
              <a href="{{URL::To('package-detail',$value->id)}}" class="btn btn-primary btn-block">Order Now</a> </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- ./End Room -->
    </div>
  </div>
</section>
@endsection 