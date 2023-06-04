@extends('layouts.layout')
@section('title', 'Daily Attendance')
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
        @include('common.commonFunction')
      </div>
      <div class="col-md-12">
        <form method="post" action="{{route('daily-attendance.filter')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-inline">
            <div class="row">
              <!-- <div class="col-md-3">
                <div class="field-wrapper">
                  <div class="input-group">
                    <select class="form-control" name="user_type">
                      @foreach($allusertype as $value)
                      <option value="{{$value->id}}">{{$value->user_type}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">Employee </div>
                </div>
              </div> -->
              <div class="col-md-3">
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control datepicker" type="text" name="date" value="{{!empty($date)?date('Y/m/d',strtotime($date)):date('Y/m/d')}}" autocomplete="off">
                  </div>
                  <div class="field-placeholder">Date </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="field-wrapper">
                  <div class="input-group">
                    <input type="submit" value="Get Employee List" class="btn btn-info btn-md">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      @if(!empty($alldata))
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Employee List</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              @if($alldata != 'Holiday')
              <table id="" class="table v-middle">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Employee Name</th>
                    <th>Date</th>
                    <th>In Time</th>
                    <th>Out Time</th>
                    <th>Status</th>
                  </tr>
                </thead>
                {!! Form::open(array('route' =>['store-daily-attendance'],'method'=>'POST','files'=>true)) !!}
                <tbody>
                  <?php                           
                    $number = 1;
                    $numElementsPerPage = 15; // How many elements per page
                    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                    $rowCount = 0;
                  ?>
                  <?php $rowCount++; ?>
                  @foreach($alldata as $value)
                  <tr>
                    <td>{{$currentNumber++}}</td>
                    <td>
                      {{$value->name}}
                      <input type="hidden" name="attendanceDetails[{{$currentNumber}}][employee_id]" value="{{$value->id}}">
                    </td>
                    <td>{{$date}}</td>
                    <td>
                      <input type="time" name="attendanceDetails[{{$currentNumber}}][in_time]" value="09:00">
                    </td>
                    <td>
                      <input type="time" name="attendanceDetails[{{$currentNumber}}][out_time]" value="09:00">
                    </td>
                    <td>
                      <select class="form-control" name="attendanceDetails[{{$currentNumber}}][status]">
                        <option value="0">Absent</option>
                        <option value="1">Present</option>
                      </select>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="6">
                      <input type="hidden" name="date" value="{{$date}}">
                      <input type="submit" class="form-control" value="Save">
                    </td>
                  </tr>
                </tfoot>
                {!! Form::close() !!}
              </table>
              @else
              <div class="alert alert-info" role="alert">
                <b>{{$alldata}}</b>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->        
@endsection 