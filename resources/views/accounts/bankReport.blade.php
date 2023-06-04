{{Session::get('currency')}} @extends('layouts.layout')
@section('title', 'Bank Report')
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
              <form method="post" action="{{ route('bank-report.filter', $singledata->id) }}" autocomplete="off">
              @csrf
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

                          <input type="hidden" name="bank_id" value="{{$singledata->id}}">
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
            <h3 class="card-title">Bank Report</h3>
                
            <a onclick="printReport();" href="javascript:0;"><img class="img-thumbnail" style="width:30px;" src='{{asset("custom/img/print.png")}}'></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12" id="printTable">
              <center><h5 style="margin: 0px">Bank Info</h5></center>
              <div class="table-responsive">
                <table class="" style="width: 100%; font-size: 14px;" cellspacing="0" cellpadding="0">
                  <thead> 
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Bank Name</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$singledata->bank_name}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Account Name</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$singledata->account_name}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Account No</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$singledata->account_no}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Account Type</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$singledata->bankaccount_accounttype_object->name}}</td>
                    </tr>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Branch</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$singledata->bank_branch}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Created Date</td>
                      
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><?php echo dateFormateForView($singledata->opening_date); ?></td>
                    </tr>
                  </thead>
                </table>
              </div>
              <br>
              <center><h5 style="margin: 0px">Transaction Info</h5></center>
              <div class="table-responsive">
                @if(!empty($start_date) && !empty($end_date))
                <center><h6 style="margin: 0px">From : {{dateFormateForView($start_date)}} To : {{dateFormateForView($end_date)}}</h6></center>
                @else
                <center><h6 style="margin: 0px">Today : {{date('d-m-Y')}}</h6></center>
                @endif
                <table class="" style="width: 100%; font-size: 14px;" cellspacing="0" cellpadding="0">  
                  <thead> 
                    <tr style="background: #ccc; color: #000"> 
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">SL</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Date</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Reason</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Credit</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Debit</th>
                      <th style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">Balance</th>
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
                      $debit = 0;
                      $credit = 0;
                    ?>
                    @foreach($alldata as $data)
                    <?php $rowCount++; ?>
                    <tr> 
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{$currentNumber++}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php echo dateFormateForView($data->transaction_date); ?>
                      </td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{ucfirst($data->reason)}}</td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php
                          $reasons = $data->reason;

                          if(preg_match("/Opening Balance/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum+$data->amount;
                            $credit = $credit+$data->amount;
                          }elseif (preg_match("/deposit/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum+$data->amount;
                            $credit = $credit+$data->amount;
                          }elseif (preg_match("/receive/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum+$data->amount;
                            $credit = $credit+$data->amount;
                          }
                        ?>
                      </td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"> 
                        <?php
                          if(preg_match("/withdraw/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum-$data->amount;
                            $debit = $debit+$data->amount;
                          }elseif (preg_match("/transfer/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum-$data->amount;
                            $debit = $debit+$data->amount;
                          }elseif (preg_match("/payment/", $reasons)) {
                            echo number_format($data->amount, 2);
                            $sum = $sum-$data->amount;
                            $debit = $debit+$data->amount;
                          }
                        ?>
                      </td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px">{{number_format($sum, 2)}}</td>
                    </tr>
                    @endforeach
                    @if($rowCount==0)
                    <tr>
                      <td colspan="6" align="center">
                        <h4 style="color: #ccc">No Data Found . . .</h4>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                  <tfoot> 
                    <tr> 
                      <td colspan="3" style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><center><b>Total</b></center></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($credit, 2)}}</b></td>
                      <td style="font-weight: bold; border: 1px solid #ddd; padding: 3px 3px"><b>{{Session::get('currency')}} {{number_format($debit, 2)}}</b></td>
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