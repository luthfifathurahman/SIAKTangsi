<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'User';
	$breadcrumb[1]['url'] = url('backend/users-user');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Master User')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Data User
		</h1>
		@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	</section>
	<!-- /.content-header -->


	{{ Form::open(['url' => url('/backend/users-user/delete'), 'method' => 'POST','class' => 'form-horizontal']) }}
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3><center>Data User</center> </h3>
					</div>
						
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="col-lg-2 col-md-3 col-xs-3">
								@include('backend.elements.create_button',array('url' => '/backend/users-user/tambah'))
							</div>
							<div class="col-lg-2 col-md-3 col-xs-3">
								<?php
									$segment =  Request::segment(2);
									$userinfo = Session::get('userinfo');
									$access_control = Session::get('access_control');
									if (!empty($access_control)) :
										if ($access_control[$userinfo['user_level_id']][$segment] == "a"):
								?>           
										<button type="submit" class="btn btn-block btn-warning btn-delete-check"><i class="fa fa-minus"></i>&nbsp; Delete</a>
								<?php
										endif;
									endif;
								?>
							</div>							
							<div class="col-lg-6 col-md-3 col-xs-3">

							</div>
							<div class="col-lg-2 col-md-3 col-xs-3">
								<a href="/backend/dashboard" class="btn btn-block btn-danger">
									<i class="fa fa-arrow-left mr-1"></i> Kembali
								</a>
							</div>
						</div>
						<br>
						@include('backend.elements.notification')
						<table id="dataTable" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>
										<span class="uni">
											<input type='checkbox' value='checkall' onclick='checkAll(this)' />
										</span>
									</th>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Level</th>
									<th>Status</th>
									<th>Actions</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.main content -->
	{{ Form::close() }}
</div>

@endsection

<!-- CSS -->
@section('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=url('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
@endsection

<!-- JAVASCRIPT -->
@section('script')
	<!-- DataTables  & Plugins -->
	<script src="<?=url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?=url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
	<script>
		$('#dataTable').DataTable({
			processing: true,
			serverSide: true,
            "order": [[ 1, "desc" ]],
			ajax: "<?=url('backend/users-user/datatable');?>",
			columns: [
                {data: 'check', name: 'check', orderable: false, searchable: false},
				{data: 'id', name: 'id'},
				{data: 'firstname', name: 'firstname'},
				{data: 'email', name: 'email'},
				{data: 'phone', name: 'phone'},
				{data: 'name', name: 'user_levels.name'},
				{data:  'active', render: function ( data, type, row ) {
					var text = "";
					var label = "";
					if (data == 1){
						text = "Active";
						label = "success";
					} else 
					if (data == 2){
						text = "Banned";
						label = "danger";
					}else 
					if (data == 3){
						text = "Non Active";
						label = "warning";
					}
					return "<span class='label label-" + label + "'>"+ text + "</span>";
                }},				
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			"lengthChange": false, 
			"autoWidth": false,
			"responsive": true
		});

        function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
                if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
                }
            }
        }	

        $('.btn-delete-check').on('click', function(e){
            e.preventDefault();
            if (confirm("Apakah anda yakin mau menghapus data-data ini?")) {
                $(this).parents('form').submit();
            }
        });
	</script>
@endsection