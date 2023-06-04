@extends('website.layouts.layout')
@section('title', 'Smart Hostel | Room Detail')
@section('content')
<div class="container">
  <div class="row"> 
    <!-- Slider -->
    <section class="room-slider standard-slider mt50">
      <div class="col-sm-12 col-md-8">
        <div id="owl-standard" class="owl-carousel">
          <?php 
          if(!empty($single_data->room_photos)){
          $images = explode('_', $single_data->room_photos);
          foreach($images as $image){
            $picture="/storage/app/public/uploads/room_photos/".$image;    
          ?>
          <div class="item"> <a href="{{asset($picture)}}" data-rel="prettyPhoto[gallery1]"><img src="{{asset($picture)}}" alt="Bed" class="img-responsive"></a> </div>
          <?php }} ?>
        </div>
      </div>
    </section>
    
    <!-- Reservation form -->
    <section id="reservation-form" class="mt50 clearfix">
      <div class="col-sm-12 col-md-4">
        <form class="reservation-vertical clearfix" role="form" method="post" action="php/reservation.php" name="reservationform" id="reservationform">
          <h2 class="lined-heading"><span>Reservation</span></h2>
          <!-- <div class="price">
            <h4>{{$single_data->rooms_type_object->name}}</h4>
            &euro; 99,-<span> a night</span></div> -->
          <div id="message"></div>
          <!-- Error message display -->
          <div class="form-group">
            <label for="email" accesskey="E">E-mail</label>
            <input name="email" type="text" id="email" value="" class="form-control" placeholder="Please enter your E-mail"/>
          </div>
          <div class="form-group">
            <select class="hidden" name="room" id="room">
              <option selected="selected">Double Room</option>
            </select>
          </div>
          <div class="form-group">
            <label for="checkin">Check-in</label>
            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-In is from 11:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
            <i class="fa fa-calendar infield"></i>
            <input name="checkin" type="text" id="checkin" value="" class="form-control" placeholder="Check-in"/>
          </div>
          <div class="form-group">
            <label for="checkout">Check-out</label>
            <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Check-out is from 12:00"> <i class="fa fa-info-circle fa-lg"> </i> </div>
            <i class="fa fa-calendar infield"></i>
            <input name="checkout" type="text" id="checkout" value="" class="form-control" placeholder="Check-out"/>
          </div>
          <div class="form-group">
            <div class="guests-select">
              <label>Guests</label>
              <i class="fa fa-user infield"></i>
              <div class="total form-control" id="test">1</div>
              <div class="guests">
                <div class="form-group adults">
                  <label for="adults">Adults</label>
                  <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="+18 years"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                  <select name="adults" id="adults" class="form-control">
                    <option value="1">1 adult</option>
                    <option value="2">2 adults</option>
                    <option value="3">3 adults</option>
                  </select>
                </div>
                <div class="form-group children">
                  <label for="children">Children</label>
                  <div class="popover-icon" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="0 till 18 years"> <i class="fa fa-info-circle fa-lg"> </i> </div>
                  <select name="children" id="children" class="form-control">
                    <option value="0">0 children</option>
                    <option value="1">1 child</option>
                    <option value="2">2 children</option>
                    <option value="3">3 children</option>
                  </select>
                </div>
                <button type="button" class="btn btn-default button-save btn-block">Save</button>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Book Now</button>
        </form>
      </div>
    </section>
    
    <!-- Room Content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-7 mt50">
            <h2 class="lined-heading"><span>Room Details</span></h2>
            <h3 class="mt50">Amenities</h3>
            <table class="table table-striped mt30">
              <tbody>
                <?php
                  $decode = json_decode($single_data->rooms_type_object->amenity_id, true);
                  foreach ($decode as $key => $values) {
                    $name = DB::table('amenities')->where('id', $values)->first();                
                ?>
                <tr>
                  <td><i class="fa fa-check-circle"></i> {{$name->name}}</td>
                </tr>
                <?php }?>
              </tbody>
            </table>
            <p class="mt50">{{$single_data->description}}</p>
          </div>
          <div class="col-sm-5 mt50">
            <h2 class="lined-heading"><span>Overview</span></h2>
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
              <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
              <li><a href="#facilities" data-toggle="tab">Facilities</a></li>
              <li><a href="#extra" data-toggle="tab">Extra</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="overview">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. In hendrerit risus arcu, in eleifend metus dapibus varius. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. Phasellus et mattis lectus, et gravida urna.</p>
                <p><img src="{{asset('custom/website/images/tab/restaurant-01.jpg')}}" alt="food" class="pull-right"> Donec pretium sem non tincidunt iaculis. Nunc at pharetra eros, a varius leo. Mauris id hendrerit justo. Mauris egestas magna vitae nisi ultricies semper. Nam vitae suscipit magna. Nam et felis nulla. Ut nec magna tortor. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. </p>
              </div>
              <div class="tab-pane fade" id="facilities">Phasellus sodales justo felis, a vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.</div>
              <div class="tab-pane fade" id="extra">Aa vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<!-- Other Rooms -->
<section class="rooms mt50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="lined-heading"><span>Other rooms</span></h2>
      </div>
      <!-- Room -->
      @foreach($other_rooms as $value)
      <div class="col-sm-4">
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