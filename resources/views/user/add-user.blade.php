@extends('layouts.layout')
@section('title', 'Add/Edit User')
@section('content')
<!-- Content Header (Page header) -->
<?php
  $baseUrl = URL::to('/');
?>
<!-- Content wrapper scroll start -->
<div class="content-wrapper-scroll">

  <!-- Content wrapper start -->
  <div class="content-wrapper">
    <!-- Row start -->
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        @include('common.message')
      </div>
    </div>
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          @if(!empty($single_data))
          {!! Form::open(array('route' =>['user-list.update',$single_data->id],'method'=>'PUT')) !!}
          <?php $btn='Update';?>
          @else
          {!! Form::open(array('route' =>['user-list.store'],'method'=>'POST')) !!}
          <?php $btn='Add';?>
          @endif
          <div class="card-header">
            <div class="card-title">{{$btn}} User</div>
          </div>
          
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <select class="select-single js-states" name="user_type" title="Select Type" data-live-search="true" required="">
                    <option value="">Select</option>
                    @foreach($alltype as $type)
                    <option value="{{$type->id}}" {{(!empty($single_data) && $single_data->user_type==$type->id)?'selected':''}}>{{$type->user_type}}</option>
                    @endforeach
                  </select>
                  <div class="field-placeholder">User Type <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="name" value="{{!empty($single_data->name)?$single_data->name:''}}">
                  <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="email" value="{{!empty($single_data->email)?$single_data->email:''}}">
                  <div class="field-placeholder">Email <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="phone" value="{{!empty($single_data->phone)?$single_data->phone:''}}">
                  <div class="field-placeholder">Phone <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="password">
                  <div class="field-placeholder">Password <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="password_confirmation">
                  <div class="field-placeholder">Conforim Password <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <input type="text" name="nid_no" value="{{!empty($single_data->nid_no)?$single_data->nid_no:''}}">
                  <div class="field-placeholder">NID No</div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <textarea name="address" rows="1">{{!empty($single_data->address)?$single_data->address:''}}</textarea>
                  <div class="field-placeholder">Address <span class="text-danger">*</span></div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="field-wrapper">
                  <select name="status">
                    @if(!empty($single_data) && $single_data->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                    @elseif(!empty($single_data) && $single_data->status == 0)
                    <option value="1">Active</option>
                    <option value="0" selected>Inactive</option>
                    @else
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    @endif
                  </select>
                  <div class="field-placeholder">Status</div>
                </div>
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">{{$btn}}</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection