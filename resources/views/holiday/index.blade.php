@extends('layouts.layout')
@section('title', 'Holiday')
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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Holiday</div>
            <a href="javascript:void(0)" class="btn btn-sm btn-warning pull-right" data-bs-toggle="modal" data-bs-target="#myModal"><i class="icon-plus-circle"></i> <b>Holiday</b></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="" class="table v-middle">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th width="18%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                           
                    $number = 1;
                    $numElementsPerPage = 15; // How many elements per page
                    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                    $rowCount = 0;
                  ?>
                  @foreach($alldata as $data)
                  <?php $rowCount++; ?>
                  <tr>
                    <td>{{$currentNumber++}}</td>
                    <td>{{dateFormateForView($data->date)}}</td>
                    <td>{{$data->name}}</td>
                    <td>
                      <div class="actions">
                        <div class="row">
                          <div class="col-md-6" style="padding: 0px;">
                        <a class="btn btn-primary custom-btn" href="{{$baseUrl.'/'.config('app.hr').'/approve-applied-leave/'.$data->id}}" data-bs-toggle="modal" data-bs-target="#editModal_{{$data->id}}" style="width: 100%;">
                          Edit
                        </a>
                        </div>
                        <div class="col-md-6">
                        {{Form::open(array('route'=>['manage-holiday.destroy',$data->id],'method'=>'DELETE'))}}
                          <button type="submit" class="btn btn-danger btn-xs confirmdelete custom-btn" confirm="You want to delete this informations ?" title="Delete">Delete</button>
                        {!! Form::close() !!}
                        </div>
                        </div>
                      </div>


                      <!-- Start Modal for edit bank -->
                      <div class="modal fade" id="editModal_{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Bank Account</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            {!! Form::open(array('route' =>['manage-holiday.update', $data->id],'method'=>'PUT')) !!}
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <input type="text" name="name" autocomplete="off" class="form-control" value="{{$data->name}}" required="">
                                    <div class="field-placeholder">Name</div>
                                  </div>
                                </div>
                                <div class="col-md-6">  
                                  <div class="field-wrapper">
                                    <input type="text" name="date" autocomplete="off" class="form-control datepicker" value="{{$data->date}}" required="">
                                    <div class="field-placeholder">Date</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              {{Form::submit('Update',array('class'=>'btn btn-success btn-sm', 'style'=>'width:15%'))}}
                            </div>
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                      <!-- End Modal for edit bank -->
                    </td>
                  </tr>
                  @endforeach
                  @if($rowCount==0)
                  <tr>
                    <td colspan="4" align="center">
                      <h4 style="color: #ccc">No Data Found . . .</h4>
                    </td>
                  </tr>
                  @endif
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

<!-- Modal start -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-plus-circle"></i> ADD DETAILS</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      {!! Form::open(array('route' =>['manage-holiday.store'],'method'=>'POST')) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="field-wrapper">
              <input type="text" name="name" autocomplete="off" class="form-control" required="">
              <div class="field-placeholder">Name</div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="field-wrapper">
              <input type="text" name="date" autocomplete="off" class="form-control datepicker" value="{{date('Y-m-d')}}" required="">
              <div class="field-placeholder">Date</div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        {{Form::submit('Save',array('class'=>'btn btn-primary btn-sm', 'style'=>'width:15%'))}}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!-- Modal end -->            
@endsection 