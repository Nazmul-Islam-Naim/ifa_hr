@extends('layouts.layout')
@section('title', 'ড্যসবোর্ড')
@section('content')
<style>
	.HomeCard{
		height: 140px;
		border-radius: 3%;
		/* background-color: aquamarine; */
	}
</style>
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
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-location_city"></i>
					</div>
					<div class="sale-details">
						
						<h2>{{Converter::en2bn($total_workstation)}}</h2>
						<a href="{{URL::To('dashboard/workstation-list')}}"><p>মোট কর্মস্থল </p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-home"></i>
					</div>
					<div class="sale-details">
						
						<h2>{{Converter::en2bn($total_department)}}</h2>
						<a href="{{URL::To('dashboard/department-list')}}"><p>মোট ডিপার্টমেন্ট</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-person"></i>
					</div>
					<div class="sale-details">
						
						<h2>{{Converter::en2bn($total_designation)}}</h2>
						<a href="{{URL::To('dashboard/designation-list')}}"><p>মোট পদবী</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-people_outline"></i>
					</div>
					<div class="sale-details">
						
						<h2>{{Converter::en2bn($total_employee_present)}}</h2>
						<a href="{{URL::To('hr/employee-transfer')}}"><p>বর্তমান মোট কর্মচারী</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-person"></i>
					</div>
					<div class="sale-details">
						
						<h2>{{Converter::en2bn($total_employee_pension)}}</h2>
						<a href="{{URL::To('hr/employee-pension-prl-list')}}"><p>পেনশন প্রাপ্ত মোট কর্মচারী </p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
				<div class="stats-tile HomeCard">
					<div class="sale-icon">
						<i class="icon-people"></i>
					</div>
					<div class="sale-details">
						<h2>{{Converter::en2bn($total_employee)}}</h2>
						<a href="{{URL::To('hr/employee-list')}}"><p>সবসময়ের সর্বোমোট কর্মচারী</p></a>
					</div>
					<div class="sale-graph">
						<div id="sparklineLine5"></div>
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