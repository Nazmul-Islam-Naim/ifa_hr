@extends('layouts.layout')
@section('title', 'কর্মকর্তা/কর্মচারীর তালিকা')
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
        {{-- @include('app.Http.Controllers.ConverterController') --}}
      </div>
  
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">কর্মকর্তা/কর্মচারীর তালিকা</h3>
              <a href="{{route('employee-list/create')}}" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus-circle"></i> <b>কর্মকর্তা/কর্মচারীর যোগ করুন</b></a>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="custom-tabs-container">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <a class="nav-link active" id="first-tab" data-bs-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">কার্ড ভিউ</a>
                        </li>
                        <li class="nav-item" role="presentation">
                          <a class="nav-link" id="second-tab" data-bs-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">তালিকা ভিউ</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="first" role="tabpanel">
                          <div class="row">
                            @foreach($alldata as $data)
                            <div class="col-md-4 col-sm-6 img_div_modal">
                              <div class="staffinfo-box">
                                <div class="staffleft-box">
                                  @if (!empty($data->image))
                                  <img src="{{asset('storage/app/public/uploads/employee/'.$data->image)}}">
                                  @else
                                  <img src="{{asset('storage/app/public/uploads/employee/no-image.jpg')}}">
                                  @endif
                                </div>
                                <div class="staffleft-content">
                                  <h5><span data-toggle="tooltip" title="Name" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">{{$data->name}}</span></h5>
                                  <p><font data-toggle="tooltip" title="Employee Id" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><?php echo Converter::en2bn($data->employee_id); ?></font></p>
                                  <p><font data-toggle="tooltip" title="Contact Number" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">{{$data->phone}}</font></p>
                                  <p><font data-toggle="tooltip" title="Location" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">{{$data->location}}</font><font data-toggle="tooltip" title="Department" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"> @if(!empty($data->department_id)){{$data->user_department_object->name}}@endif</font></p>
                                  <p class="staffsub"><span data-toggle="tooltip" title="Role" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">@if(!empty($data->designation_id)){{$data->user_designation_object->name}}@endif</span></p>
                                </div>
                                <div class="overlay3">
                                  <div class="stafficons">
                                    <a title="Show" href="{{ URL::to('hr/employee-pofile', $data->id) }}"><i class="icon-list2"></i></a>
                                    <a title="Edit" href="{{ route('edit-employee-list', $data->id) }}"><i class=" icon-pencil"></i></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                        </div>
                        <div class="tab-pane fade" id="second" role="tabpanel">
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive table-hover"> 
                              <thead> 
                                <tr> 
                                  <th>সিঃ</th>
                                  <th>কর্মকর্তা/কর্মচারীর আইডি</th>
                                  <th>কর্মকর্তা/কর্মচারীর নাম</th>
                                  <th>ডিপার্টমেন্ট</th>
                                  <th>পদবী</th>
                                  <th>বেতন স্কেল</th>
                                  <th>বেতন</th>
                                  <th>কর্মস্থল</th>
                                  <th>যোগদানের তারিখ</th>
                                  <th>জেলা</th>
                                  <th width="15%">একশন</th>
                                </tr>
                              </thead>
                              <tbody> 
                                <?php                           
                                  $number = 1;
                                  $numElementsPerPage = 250; // How many elements per page
                                  $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                  $currentNumber = ($pageNumber - 1) * $numElementsPerPage + $number;
                                  $rowCount = 0;
                                ?>
                                @foreach($alldata as $data)
                                  <?php $rowCount++; ?>
                                <tr> 
                                  <td><label class="label label-success">{{$currentNumber++}}</label></td>
                                  <td>{{Converter::en2bn($data->employee_id)}}</td>
                                  <td><a href="{{$baseUrl.'/'.config('app.em').'/employee-ledger/'.$data->id}}">{{$data->name}}</a></td>
                                  <td>{{$data->user_department_object->name}}</td>
                                  <td>{{$data->user_designation_object->name}}</td>
                                  <td>{{$data->user_salary_scale_object->name}}</td>
                                  <td>{{Converter::en2bn($data->salary)}}</td>
                                  <td>{{$data->user_workstation_object->name}}</td>
                                  <td>{{date('d-m-Y',strtotime($data->join_date))}}</td>
                                  <td>{{$data->user_district_object->name}}</td>
                                  <td>
                                    <div class="actions">
                                      <a class="btn btn-primary custom-btn" href="{{ URL::to('hr/employee-pofile', $data->id) }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile">প্রোফাইল</a>
                                      <a class="btn btn-danger custom-btn" data-placement="top" title="" data-original-title="Edit" href="{{ route('edit-employee-list', $data->id) }}">সংশোধন</a>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                                @if($rowCount==0)
                                  <tr>
                                    <td colspan="8" align="center">
                                      <h4 style="color: #ccc">No Data Found . . .</h4>
                                    </td>
                                  </tr>
                                @endif
                              </tbody>
                            </table>
                            <div class="col-md-12" align="right">
                              {{ $alldata->render() }}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <div class="card-footer"></div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
</div>
<!-- /.content -->
@endsection 