@extends('layouts.layout')
@section('title', 'Bank Deposit')
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
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        @include('common.message')
      </div>
    </div>
    <div class="row gutters">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Deposit</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {!! Form::open(array('route' =>['bank-deposit.store'],'method'=>'POST')) !!}
          <div class="card-body">
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="text" value="{{$alldata->bank_name}}" readonly="" required="">
                <input type="hidden" class="form-control" name="bank_id" value="{{$alldata->id}}">
              </div>
              <div class="field-placeholder">Bank Name <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="text" value="{{$alldata->account_name}}" readonly="" required="">
              </div>
              <div class="field-placeholder">Account Name <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="text" value="{{$alldata->account_no}}" readonly="" required="">
              </div>
              <div class="field-placeholder">Account No <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="text" value="{{$alldata->balance}}" readonly="">
              </div>
              <div class="field-placeholder">Available Amount </div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control" type="number" name="deposit_amount" value="" autocomplete="off" required="">
              </div>
              <div class="field-placeholder">Amount <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <input class="form-control datepicker" type="text" name="transaction_date" value="{{date('Y-m-d')}}" autocomplete="off" required="">
              </div>
              <div class="field-placeholder">Date <span class="text-danger">*</span></div>
            </div>
            <div class="field-wrapper">
              <div class="input-group">
                <textarea class="form-control" name="note"></textarea>
              </div>
              <div class="field-placeholder">Note</div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
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