<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Media Library';
	$breadcrumb[1]['url'] = url('backend/media-library');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Media Library')

<!-- CONTENT -->
@section('content')
    {{ Form::open(['method' => 'POST','class' => 'form-horizontal']) }}
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
            <h1>
                Media Library
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
							<h3><center><h3>Media Library</h3></center> </h3>
						</div>
						
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-xs-3">
									<?php
										$userinfo = Session::get('userinfo');
										$access_control = Session::get('access_control');
										if (!empty($access_control)) :
											if ($access_control[$userinfo['user_level_id']]["media-library"] == "a"):
									?>
									<a href="<?=url('/backend/media-library/popup-media/0/0');?>" class="btn-index btn btn-primary btn-block popup_media" title="Add"><i class="fa fa-plus"></i>&nbsp; Add</a>
									<?php
											endif;
										endif;
									?>
								</div>
								<div class="col-lg-2 col-md-3 col-xs-3">
									<?php
										$segment =  Request::segment(2);
										$userinfo = Session::get('userinfo');
										$access_control = Session::get('access_control');
										if (!empty($access_control)) :
											if ($access_control[$userinfo['user_level_id']][$segment] == "a"):
									?>           
										<button type="submit" class="btn btn-block btn-danger btn-delete-check"><i class="fa fa-minus"></i>&nbsp; Delete</a>
									<?php 
											endif;
										endif;
									?>
								</div>
								<div class="col-lg-6 col-md-3 col-xs-3"></div>
								<div class="col-lg-2 col-md-3 col-xs-4">
									<a href="/backend/dashboard" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
								</div>
							</div>
							<br>
							@include('backend.elements.notification')
							<table class="table table-striped table-hover table-bordered dt-responsive nowrap datatable-media-library" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>
											<span class="uni">
											  	<input type='checkbox' value='checkall' onclick='checkAll(this)' />
											</span>
										</th>
										<th>No</th>
										<th>Gambar</th>
										<th>Nama</th>
										<th>Tipe</th>
										<th>Ukuran</th>
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
    {{ Form::close() }}
@endsection

@section('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="<?=url('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
	<!-- colorbox -->
	<link href="<?=url('asset/bower_components/colorbox/colorbox.css');?>" rel="stylesheet">	
@endsection

@section('script')
	<!-- DataTables  & Plugins -->
	<script src="<?=url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?=url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
	<script src="<?=url('asset/bower_components/colorbox/jquery.colorbox.js');?>"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".popup_media").colorbox({
				'width'				: '75%',
				'height'			: '90%',
				'maxWidth'			: '75%',
				'maxHeight'			: '90%',
				'transition'		: 'elastic',
				'scrolling'			: false,

				onComplete			: function() { 
													$( ".tab-content" ).height(0.75 * $( "#cboxLoadedContent" ).height());
													$( ".table-content" ).height($( ".tab-content" ).height()-60);
													$( ".fancybox-inner" ).css('overflow','hidden');
												 },

				onClosed			: function() { 
										$('.datatable-media-library').DataTable().fnDestroy();
										$('.datatable-media-library tbody').empty();
										$('.datatable-media-library').DataTable({
											processing: true,
											serverSide: true,
                                            "order": [[ 1, "desc" ]],
											ajax: "<?=url('backend/media-library/datatable');?>",
											columns: [
                                                {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
												{"data": null, "name": false, orderable: false, searchable: false,
													render: function (data, type, row, meta){
														return meta.row + meta.settings._iDisplayStart + 1;
													}
												},
												{data:  'url', render: function ( data, type, row ) {
													url = "<?=url('/')?>";
													var lastPart = data.split("/").pop();
													return "<a class='gallery' target='blank' href='"+url+'/'+data+"'><img width=50px src='"+url+'/upload/img/thumbnails/'+lastPart+"' class='img-responsive'></a>";
												}, orderable: false, searchable: false},				
												{data: 'name', name: 'name'},
												{data: 'type', name: 'type'},
												{data: 'size', name: 'size'},
												{data: 'action', name: 'action', orderable: false, searchable: false}
											],
											responsive: true
										});
									},
			});
		})
	</script>



	<script>
		$('.datatable-media-library').DataTable({
			processing: true,
			serverSide: true,
            "order": [[ 1, "desc" ]],
			ajax: "<?=url('backend/media-library/datatable');?>",
			columns: [
                {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
				{"data": null, "name": false, orderable: false, searchable: false,
					render: function (data, type, row, meta){
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{data:  'url', render: function ( data, type, row ) {
					url = "<?=url('/')?>";
					var lastPart = data.split("/").pop();
					return "<a class='gallery' target='blank' href='"+url+'/'+data+"'><img width=50px src='"+url+'/upload/img/thumbnails/'+lastPart+"' class='img-responsive'></a>";
                }, orderable: false, searchable: false},				
				{data: 'name', name: 'name'},
				{data: 'type', name: 'type'},
				{data: 'size', name: 'size'},
				{data: 'action', name: 'action', orderable: false, searchable: false}
			],
			responsive: true
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
	
	@include('backend.partials.colorbox')
@endsection