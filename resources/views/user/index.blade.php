@extends('layouts.layout')
@section('title', 'Users')
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Users</div>
            <a href="{{$baseUrl.'/'.config('app.user').'/user-list/create'}}" class="btn btn-sm btn-warning pull-right"><i class="icon-plus-circle"></i> <b>ADD USER</b></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table v-middle">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sl = 1;
                  ?>
                  @foreach($alldata as $data)
                  <tr>
                    <td>{{$sl++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->phone}}</td>
                    <td>
                      @if($data->status == 1)
                      <span class="badge bg-success">Active</span>
                      @elseif($data->status == 0)
                      <span class="badge bg-danger">Inactive</span>
                      @elseif($data->status == 2)
                      <span class="badge bg-warning">Apartment Assign</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group" style="float:right">
                        <a class="btn btn-sm btn-primary" href="{{URL::To('user/user-list/'.$data->id.'/edit')}}"><i class="icon-edit1 text-white"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection 