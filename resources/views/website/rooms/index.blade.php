@extends('website.layouts.layout')
@section('title', 'Smart Hostel | Room List')
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
        @foreach(\App\Models\RoomType::where('status', '1')->get() as $value)
        <li><a href="#" data-filter=".roomType{{$value->id}}">{{$value->name}}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

<!-- Rooms -->
<section class="rooms mt100">
  <div class="container">
    <div class="row room-list fadeIn appear"> 
      <!-- Room -->
      @foreach(\App\Models\Room::where('status', '1')->get() as $value)
      <div class="col-sm-4 roomType{{$value->room_type_id}}">
        <?php 
        if(!empty($value->room_photos)){
        $images = explode('_', $value->room_photos)[0];
          $picture="/storage/app/public/uploads/room_photos/".$images;
        }
        ?>
        <div class="room-thumb"> <img src="{{asset($picture)}}" alt="room 1" class="img-responsive" />
          <div class="mask">
            <div class="main">
              <h5>{{$value->rooms_type_object->name}}</h5>
              <!-- <div class="price">&euro; 99<span>a night</span></div> -->
            </div>
            <div class="content">
              <p><span>{{$value->rooms_type_object->name}} Room</span> {{$value->description}}</p>
              <div class="row">
                <?php
                  $decode = json_decode($value->rooms_type_object->amenity_id, true);
                  foreach ($decode as $key => $values) {
                    $name = DB::table('amenities')->where('id', $values)->first();                
                ?>
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><i class="fa fa-check-circle"></i> {{$name->name}}</li>
                  </ul>
                </div>
                <?php } ?>
              </div>
              <a href="{{URL::to('room-detail',$value->slug)}}" class="btn btn-primary btn-block">Book Now</a> </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- ./End Room -->
    </div>
  </div>
</section>
@endsection 