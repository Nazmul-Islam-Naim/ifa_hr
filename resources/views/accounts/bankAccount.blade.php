@extends('layouts.layout')
@section('title', 'Bank Account')
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
            <div class="card-title">Bank Account</div>
            <a href="javascript:void(0)" class="btn btn-sm btn-warning pull-right" data-bs-toggle="modal" data-bs-target="#myModal"><i class="icon-plus-circle"></i> <b>ADD BANK</b></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="dataTable" class="table v-middle">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Account Type</th>
                    <th>Branch</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th width="40px">Action</th>
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
                    <td><a href="{{$baseUrl.'/'.config('app.account').'/bank-report/'.$data->id}}">{{$data->bank_name}}</a></td>
                    <td>{{$data->account_name}}</td>
                    <td>{{$data->account_no}}</td>
                    <td><span class="label label-success">{{$data->bankaccount_accounttype_object->name}}</span></td>
                    <td>{{$data->bank_branch}}</td>
                    <td>{{Session::get('currency')}} {{$data->balance}}</td>
                    <td>
                      @if ($data->status == 1)
                      <span class="badge bg-primary">Active</span>
                      @elseif ($data->status == 0)
                      <span class="badge bg-warning">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{$baseUrl.'/'.config('app.account').'/bank-deposit/'.$data->id}}">Deposit</a></li>
                          <li><a class="dropdown-item" href="{{$baseUrl.'/'.config('app.account').'/amount-withdraw/'.$data->id}}">Withdraw</a></li>
                          <li><a class="dropdown-item" href="{{$baseUrl.'/'.config('app.account').'/amount-transfer/'.$data->id}}">Transfer</a></li>
                          <li><a class="dropdown-item" href="{{$baseUrl.'/'.config('app.account').'/bank-report/'.$data->id}}">Report</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#editModal{{$data->id}}" data-bs-toggle="modal">Edit</a></li>
                        </ul>
                      </div>

                      <!-- Start Modal for edit bank -->
                      <div class="modal fade" id="editModal{{$data->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Bank Account</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            {!! Form::open(array('route' =>['bank-account.update', $data->id],'method'=>'PUT')) !!}
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <input type="text" name="bank_name" autocomplete="off" class="form-control" value="{{$data->bank_name}}" required="">
                                    <div class="field-placeholder">Bank Name</div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <input type="text" name="account_name" autocomplete="off" class="form-control" value="{{$data->account_name}}" required="">
                                    <div class="field-placeholder">Account Name</div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <input type="text" name="account_no" autocomplete="off" class="form-control" value="{{$data->account_no}}" required="">
                                    <div class="field-placeholder">Account Number</div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <select class="form-select" id="formSelect" name="account_type" required="">
                                      <option value="">Select</option>
                                      @foreach($allaccounttype as $type)
                                      <option value="{{$type->id}}" {{($type->id==$data->account_type)? 'selected':''}}>{{$type->name}}</option>
                                      @endforeach
                                    </select>
                                    <div class="field-placeholder">Account Type</div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <input type="text" name="bank_branch" autocomplete="off" class="form-control" value="{{$data->bank_branch}}" required="">
                                    <div class="field-placeholder">Branch</div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="field-wrapper">
                                    <?php
                                      // getting bank opening balance
                                      $openingBalance = DB::table('transation_report')->where('bank_id', $data->id)->where('reason', 'LIKE', '%' . 'Opening Balance' . '%')->first();
                                    ?>
                                    <input type="number" name="new_opening_balance" autocomplete="off" class="form-control" value="{{$openingBalance->amount}}" required="">
                                    <div class="field-placeholder">Opening Balance</div>
                                    <input type="hidden" name="bank_balance" value="{{$data->balance}}">
                                    <input type="hidden" name="old_opening_balance" value="{{$openingBalance->amount}}">
                                  </div>
                                </div>
                                <div class="col-md-6">  
                                  <div class="field-wrapper">
                                    <input type="text" name="opening_date" autocomplete="off" class="form-control datepicker" value="{{$data->opening_date}}" required="">
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
                    <td colspan="9" align="center">
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
        <h4 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-plus-circle"></i> ADD BANK ACCOUNT</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      {!! Form::open(array('route' =>['bank-account.store'],'method'=>'POST')) !!}
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="text" name="bank_name" autocomplete="off" class="form-control" placeholder="Bank Name" required="">
              <div class="field-placeholder">Bank Name</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="text" name="account_name" autocomplete="off" class="form-control" placeholder="Account Name" required="">
              <div class="field-placeholder">Account Name</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="text" name="account_no" autocomplete="off" class="form-control" placeholder="Account Number" required="">
              <div class="field-placeholder">Account Number</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <select class="form-select" id="formSelect" name="account_type" required="">
                <option value="">Select</option>
                @foreach($allaccounttype as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
              </select>
              <div class="field-placeholder">Account Type</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="text" name="bank_branch" autocomplete="off" class="form-control" placeholder="Branch" required="">
              <div class="field-placeholder">Branch</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="number" name="opening_balance" autocomplete="off" class="form-control" placeholder="Opening Balance" required="">
              <div class="field-placeholder">Opening Balance</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="field-wrapper">
              <input type="text" name="opening_date" autocomplete="off" class="form-control datepicker" value="{{date('Y-m-d')}}" required="">
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