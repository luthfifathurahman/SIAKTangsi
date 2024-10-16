<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Supplier';
	$breadcrumb[1]['url'] = url('backend/supplier');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Master Supplier')

<!-- CONTENT -->
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
            <h1>
                Data Keluarga
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
							<h3><center>Data Keluarga</center> </h3>
						</div>
						
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-xs-4">
									@include('backend.elements.create_button',array('url' => '/backend/keluarga/tambah'))
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
										<th>No</th>
										<th>Nomer KK</th>
										<th>Nama</th>
										<th>Alamat</th>
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
			processing: true,
			serverSide: true,
			ajax: "<?=url('backend/keluarga/datatable');?>",
			columns: [
				{"data": null, "name": false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
                {data: 'no_kk', name: 'nik'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			"lengthChange": false, 
			"autoWidth": false,
			"responsive": true
		});
	</script>
@endsection