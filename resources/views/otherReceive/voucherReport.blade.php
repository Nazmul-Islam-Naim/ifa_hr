@extends('layouts.layout')
@section('title', 'Other Receive Voucher Report')
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
    </div>
    <div class="row gutters">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Search Area</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
              <form method="post" action="{{ route('receive.filter') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="start_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">From </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="end_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">To </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="submit" value="Search" class="btn btn-info btn-md">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Other Receive Voucher Report</h3>
                
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12" id="printTable">
              <center><h5 style="margin: 0px">Other Receive Voucher Report</h5></center>
              <div class="table-responsive">
                @if(!empty($start_date) && !empty($end_date))
                <center><h6 style="margin: 0px">From : {{dateFormateForView($start_date)}} To : {{dateFormateForView($end_date)}}</h6></center>
                @else
                <center><h6 style="margin: 0px">Today : {{date('d-m-Y')}}</h6></center>
                @endif
                <table class="" style="width: 100%; font-size: 14px;" cellspacing="0" cellpadding="0">  
                  <thead> 
                    <tr style="background: #ccc;"> 
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">SL</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Date</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Receive Method</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Type</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Sub Type</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Issue By</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Created By</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px; color: #000">Amount</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php                           
                      $number = 1;
                      $numElementsPerPage = 250; // How many elements per page
                      $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                      $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                      $rowCount = 0;

                      $sum = 0;
                    ?>
                    @foreach($alldata as $data)
                    <?php 
                      $rowCount++;
                      $sum += $data->amount;
                    ?>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$currentNumber++}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{dateFormateForView($data->receive_date)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$data->otherreceive_bank_object->bank_name}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$data->otherreceive_type_object->name}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$data->otherreceive_subtype_object->name}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$data->issue_by}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$data->otherreceive_user_object->name}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($data->amount, 2)}}</td>
                    </tr>
                    @endforeach
                    @if($rowCount==0)
                    <tr>
                      <td colspan="8" align="center">
                        <h5 style="color: #ccc">No Data Found . . .</h5>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                  <tfoot> 
                    <tr> 
                      <td colspan="7" style="text-align: center;font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>Total</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($sum, 2)}}</b></td>
                    </tr>
                  </tfoot>
                </table>
                <div class="col-md-12" align="right">
                  {{$alldata->render()}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection 