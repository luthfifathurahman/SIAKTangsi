<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Modules';
	$breadcrumb[1]['url'] = url('backend/modules');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Modules')

<!-- CONTENT -->
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
            <h1>
                Modules
            </h1>
            @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
        </section>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3><center>Modules</center> </h3>
						</div>
						
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-xs-4">
									<a href="/backend/module/tambah" class="btn-index btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah</a>
								</div>
								<div class="col-lg-8 col-md-6 col-xs-4"></div>
								<div class="col-lg-2 col-md-3 col-xs-4">
									<a href="/backend/dashboard" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
								</div>
							</div>
							<br>
							@include('backend.elements.notification')
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Slug</th>
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
		$('#example2').DataTable({
			processing: false,
			serverSide: true,
			ajax: "<?=url('backend/datatable/modules');?>",
			columns: [
				{data: 'id', name: 'id'},
				{data: 'name', name: 'name'},
				{data: 'slug', name: 'slug'},
				{data:  'active', render: function ( data, type, row ) {
					var text = "";
					var label = "";
					if (data == 1){
						text = "Active";
						label = "success";
					} else 
					if (data == 2){
						text = "Deactive";
						label = "warning";
					}
					return "<span class='badge badge-" + label + "'>"+ text + "</span>";
                }},				
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			"lengthChange": false, 
			"autoWidth": false,
			"responsive": true
		});
	</script>
@endsection