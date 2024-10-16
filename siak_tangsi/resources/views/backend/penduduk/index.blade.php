<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data Penduduk';
	$breadcrumb[1]['url'] = url('backend/penduduk');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Data Penduduk')

<!-- CONTENT -->
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
            <h1>
                Data Penduduk
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
							<h3><center>Data Penduduk</center> </h3>
						</div>
						
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-xs-4">
									@include('backend.elements.create_button',array('url' => '/backend/penduduk/tambah'))
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
										<th>No.</th>
										<th>NIK</th>
										<th>Nama</th>
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
	</div>
@endsection

<!-- CSS -->
@section('css')
	
@endsection

<!-- JAVASCRIPT -->
@section('script')
	
	<script>
		$('#example2').DataTable({
			processing: true,
			serverSide: true,
			ajax: "<?=url('backend/penduduk/datatable');?>",
			columns: [
				{"data": null, "name": false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
                {data: 'nik', name: 'nik'},
                {data: 'nama', name: 'nama'},
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			"lengthChange": false, 
			"autoWidth": false,
			"responsive": true
		});
	</script>
@endsection