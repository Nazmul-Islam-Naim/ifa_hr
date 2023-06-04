@extends('layouts.layout')
@section('title', 'কর্মকর্তা/কর্মচারী বদলীর দরখস্ত তালিকা')
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
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">বদলীর তারিখ অনুযায়ী কর্মকর্তা/কর্মচারী খুজুন</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="col-md-12">
                <div class="form-inline">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="start_date" id="start_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">শুরুর তারিখ  </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input class="form-control datepicker" type="text" name="end_date" id="end_date" value="<?php echo date('Y-m-d');?>" autocomplete="off">
                        </div>
                        <div class="field-placeholder">শেষ তারিখ  </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="field-wrapper">
                        <div class="input-group">
                          <input type="submit" value="খুজুন" class="btn btn-success btn-md" id="filter">
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
        <div class="card card-primary">
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title">কর্মকর্তা/কর্মচারী বদলীর দরখস্ত তালিকা</h3>
            </div>
          <!-- /.box-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-bordered cell-border compact hover nowrap order-column row-border stripe" id="example"> 
                    <thead> 
                      <tr> 
                        <th>সিঃ</th>
                        <th>বদলীর তারিখ</th>
                        <th>কর্মকর্তা/কর্মচারীর নাম</th>
                        <th>মূল পদবী</th>
                        <th>বর্তমান পদবী</th>
                        <th>বর্তমান কর্মস্থল</th>
                        <th>পূর্বের পদবী</th>
                        <th>পূর্বের কর্মস্থল</th>
                        <th width="15%">একশন</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
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
{!!Html::script('custom/yajraTableJs/jquery-3.5.1.js')!!}
{!!Html::script('custom/yajraTableJs/jquery.js')!!}
{!!Html::script('custom/yajraTableJs/yajraDateTime.js')!!}
{!!Html::script('custom/yajraTableJs/newAjax.moment.js')!!}
{!!Html::script('custom/yajraTableJs/dataTable.js')!!}
{!!Html::script('custom/yajraTableJs/query.dataTables1.12.1.js')!!}
<script>
  // ==================== date format ===========
  function dateFormat(data) { 
    let date, month, year;
    date = data.getDate();
    month = data.getMonth() + 1;
    year = data.getFullYear();

    date = date
        .toString()
        .padStart(2, '0');

    month = month
        .toString()
        .padStart(2, '0');

    return `${date}-${month}-${year}`;
  }
   // ================== data table start from here ====================
	$(document).ready(function() {
		'use strict';

    filter_view();

    function filter_view(start_date = '',end_date = '') {
      var table = $('#example').DataTable({
			serverSide: true,
			processing: true,
			ajax: {
        url: "{{route('employee-transfer-application-list')}}",
        data: {start_date: start_date, end_date: end_date}
      },
      "lengthMenu": [[ 100, 150, 250, -1 ],[ '100', '150', '250', 'All' ]],
			aaSorting: [[0, "asc"]],

			columns: [
        {data: 'DT_RowIndex'},
				{
          data: 'transferred_workstation_date',
          render: function(data, type, full, meta) {
						if (data != null) {
              const toBn = n => n.replace(/\d/g, d => "০১২৩৪৫৬৭৮৯"[d]);
							return toBn(dateFormat(new Date(data)).toString());
						}
					}
        },
				{
          data: 'user_type_object.name',
          render: function(data, type, row) {
            var url = "/hr/employee-transferred-history/"+ row.employee_id; 
						return '<a href=' + url +'>'+ data +'</a>';
					}
        },
				{data: 'user_main_designation_object.name'},
				{data: 'user_present_designation_object.name'},
				{data: 'user_present_workstation_object.name'},
				{data: 'user_previous_designation_object.name'},
				{data: 'user_previous_workstation_object.name'},
				{
          data: 'action',
          orderable:true,
          searchable:true
				}
			]
    });
  }

  $('#filter').click(function (e) { 
    e.preventDefault();
    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();

    if (start_date != '' && end_date != '') {
      $('#example').DataTable().destroy();
      filter_view(start_date, end_date);
    } 
  });
  $('#reset').click(function (e) { 
    e.preventDefault();
    $('#start_date').val('');
    $('#end_date').val('');
    $('#example').DataTable().destroy();
    filter_view();
  });

});
</script>
@endsection 