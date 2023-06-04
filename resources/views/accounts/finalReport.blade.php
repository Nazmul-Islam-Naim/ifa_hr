@extends('layouts.layout')
@section('title', 'Final Report')
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
      <!-- right column -->
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Search Area</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
              <form method="post" action="{{ route('final-report.filter') }}">
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

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Final Report</h3>
                
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12" id="printTable">
              <center><h5 style="margin: 0px">Final Report</h5></center>
              @if(!empty($start_date) && !empty($end_date))
                <center><h6 style="margin: 0px">From : {{dateFormateForView($start_date)}} To : {{dateFormateForView($end_date)}}</h6></center>
              @else
                <center><h6 style="margin: 0px">Today : {{date('d-m-Y')}}</h6></center>
              @endif
              <div class="table-responsive">
                <table class="reportTable" style="width: 100%; font-size: 14px;" cellspacing="0" cellpadding="0"> 
                  <thead> 
                    <tr style="background: #ccc; color: #000;"> 
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">SL</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Particular</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Credit</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Debit</th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php 
                      $sum = 0;
                      $totalDebit = 0;
                      $totalCredit = 0;
                      $total = 0;
                    ?>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">1</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.supplier').'/product-supplier-payment-report'}}">Total Supplier Payment</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($supplier_payment, 2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">2</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.sell').'/sell-report'}}">Total Bill Collection(Restaurant)</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($total_sell, 2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">3</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.op').'/payment-voucher-report'}}">Total Other Payment</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($other_payment,2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">4</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.or').'/receive-voucher-report'}}">Total Other Receive</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($other_receive,2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">5</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.employee').'/employee-salary'}}">Total Employee Salary</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($employee_salary,2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">6</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><a href="{{$baseUrl.'/'.config('app.account').'/bank-account'}}">Banks Opening Balance</a></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($bank_opening_balance,2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">7</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Bank Deposit</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($bank_deposit, 2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">8</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Bank Withdraw</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($bank_withdraw, 2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">9</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Bank Transfer</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($bank_transfer, 2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">10</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Total Received From Hostel</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($hostel_bill_payment, 2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">11</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Total Payment For Apartment</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($apartment_bill_payment, 2)}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">12</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Total Received From Apartment</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($apartment_bill_payment_from_member, 2)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">13</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Total Apartment Rent Advance</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">0.00</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($apartment_rent_advance, 2)}}</td>
                    </tr>
                  </tbody>
                  <tfoot> 
                    <?php
                      $totalCredit = $total_sell+$other_receive+$bank_opening_balance+$bank_deposit+$hostel_bill_payment+$apartment_bill_payment_from_member;
                      $totalDebit = $supplier_payment+$other_payment+$employee_salary+$bank_withdraw+$bank_transfer+$apartment_bill_payment+$apartment_rent_advance;
                      $total = $totalCredit - $totalDebit;
                    ?>
                    <tr> 
                      <td colspan="2" style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><center><b>Total</b></center></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($totalCredit,2)}}</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($totalDebit,2)}}</b></td>
                    </tr>
                    <tr> 
                      <td colspan="2" style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><center><b>Final Balance</b></center></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($total,2)}}</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"></td>
                    </tr>
                  </tfoot>
                </table>
                <div class="col-md-12" align="right"></div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
@endsection 