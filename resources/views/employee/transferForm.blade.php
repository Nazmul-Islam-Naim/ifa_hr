@extends('layouts.layout')
@section('title', 'স্থানান্তর ফর্ম')
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
        {!! Form::open(array('route' =>['transfer-form-store',$single_data->id],'method'=>'POST','files'=>true)) !!}
        <div class="card">
          <div class="card-header">
            <div class="card-title">কর্মকর্তা/কর্মচারীকে বদলীর জন্য নিচের ফর্মটি পূরন করুন</div>
          </div>
          <div class="card-body">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control" type="text" name="" value="{{ $single_data->name }}" required="" autocomplete="off">
                    <input class="form-control" type="hidden" name="employee_id" value="{{ $single_data->id}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder"> কর্মকর্তা/কর্মচারীর নাম <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="main_designation_id" class="form-control">
                      @foreach ($all_designation as $designation)
                      <option value="{{$designation->id}}" {{($designation->id == $single_data->designation_id)?'selected':''}}>{{$designation->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">মূল পদবী <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="district_id" class="form-control">
                      @foreach ($all_district as $district)
                      <option value="{{$district->id}}" {{($district->id == $single_data->district_id)?'selected':''}}>{{$district->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">জেলা  <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="present_workstation_id" class="form-control">
                      @foreach ($all_workstation as $workstation)
                      <option value="{{$workstation->id}}" {{($workstation->id == $single_data->workstation_id)?'selected':''}}>{{$workstation->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">বর্তমান কর্মস্থল <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="present_workstation_designation_id" class="form-control">
                      @foreach ($all_designation as $designation)
                      <option value="{{$designation->id}}" {{($designation->id == $single_data->designation_id)?'selected':''}}>{{$designation->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder"> বর্তমান কর্মস্থলের পদবী <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="salary_scale_id" class="form-control">
                      @foreach ($all_salary_scale as $salary_scale)
                      <option value="{{$salary_scale->id}}" {{($salary_scale->id == $single_data->salary_scale_id)?'selected':''}}>{{$salary_scale->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">বেতন স্কেল<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control numeric" type="text" name="salary" value="" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder"> বেতন <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control numeric" type="text" name="house_rent" value=""  autocomplete="off">
                  </div>
                  <div class="field-placeholder">বাড়ী ভাড়া</div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="transferred_workstation_id" class="form-control">
                      <option value="">Select</option>
                      @foreach ($all_workstation as $transfer_workstation)
                      <option value="{{$transfer_workstation->id}}">{{$transfer_workstation->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">বদলীকৃত কর্মস্থল <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <select name="transferred_workstation_designation_id" class="form-control">
                      <option value="">Select</option>
                      @foreach ($all_designation as $transfer_designation)
                      <option value="{{$transfer_designation->id}}">{{$transfer_designation->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="field-placeholder">বদলীকৃত পদের পদবী <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control datepicker" type="text" name="present_workstation_joining_date" value="{{$single_data->join_date}}" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">বর্তমান কর্মস্থলে যোগদানের তারিখ <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control datepicker" type="text" name="transferred_workstation_date" value="" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">বদলীর তারিখ <span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control datepicker" type="text" name="transferred_workstation_joining_date" value="" required="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">বদলীকৃত কর্মস্থলে যোগদানের তারিখ<span class="text-danger">*</span></div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control numeric" type="text" name="total_taken_leave" value="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">ভোগকৃত ছুটি</div>
                </div>
                <!-- Field wrapper end -->
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <div class="input-group">
                    <input class="form-control numeric" type="text" name="allowance" value="" autocomplete="off">
                  </div>
                  <div class="field-placeholder">অতিরিক্ত দায়ীত্বের ভাতা</div>
                </div>
                <!-- Field wrapper end -->
              </div>
            </div>
            <!-- Row end -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">বদলী করুন</button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
    <!-- Row end -->
  </div>
  <!-- Content wrapper end -->
</div>
<!-- Content wrapper scroll end -->
@endsection 