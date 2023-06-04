@extends('layouts.layout')
@section('title', 'Recyle Bin')
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
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
        @include('common.message')
      </div>
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Deleted District List</div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table v-middle">
                <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $rowCount = 1;?>
                  @foreach($alldata as $data)
                  <tr>
                    <td>{{$rowCount++}}</td>
                    <td>{{$data->name}}</td>
                    <td>
                      @if($data->status == 1)
                      <span class="badge bg-success">Active</span>
                      @elseif($data->status == 0)
                      <span class="badge bg-danger">Inactive</span>
                      @endif
                    </td>
                    <td style="width: 20%; text-align:center">
                      <div class="d-flex">
                        {{-- <a href="{{ route('deleted-department-restore', $data->id) }}" class="badge bg-primary text-center"></a> --}}
                        {{Form::open(array('route'=>['deleted-district-restore',$data->id],'method'=>'PUT'))}}
                          <button type="submit" class="badge bg-success" style="width: 100%">Restore</button>
                        {!! Form::close() !!}
                        {{Form::open(array('route'=>['deleted-district-delete',$data->id],'method'=>'DELETE'))}}
                          <button type="submit" class="badge bg-danger ms-1 confirmdelete" confirm="It will parmanently delete and It can be harmful for your system." title="Delete" style="width: 100%">Delete</button>
                        {!! Form::close() !!}
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