<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Modules';
	$breadcrumb[1]['url'] = url('backend/modules');
	$breadcrumb[2]['title'] = 'Lihat Modules';
	$breadcrumb[2]['url'] = url('backend/modules/'.$data[0]->id);
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
					<div class="box box-info">
						<div class="container-fluid mb-5">
							<div class="box-header with-border">
								<center><h3>Lihat Modules</h3></center>
							</div>
							

							<?php
								if (!empty($data)):
									$data = $data[0];
							?>
								<div class="box-body">
									<div class="row">
										<div class="col-lg-10 col-md-6 col-xs-4"></div>
										<div class="col-lg-2 col-md-3 col-xs-4">
											<a href="/backend/modules" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputNIK" class="col-sm-3 col-xs-3 control-label">Nama</label>
										<div class="col-sm-6 col-xs-6">
											<span><?=$data->name;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputNama" class="col-sm-3 col-xs-3 control-label">Slug</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->slug;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputTempat" class="col-sm-3 col-xs-3 control-label">Status</label>
										<div class="col-sm-3 col-xs-3">
											<span><?php
												if ($data->active == 1){
													$text = "Active";
													$label = "success";
												} else 
												if ($data->active == 2){
													$text = "Deactive";
													$label = "warning";
												}
												echo "<span class='badge badge-" . $label . "'>". $text . "</span>";
											
											?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputAgama" class="col-sm-3 col-xs-3 control-label">Dibuat Pada tanggal</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=date('d M Y H:i:s', strtotime($data->created_at));?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputPendidikan" class="col-sm-3 col-xs-3 control-label">Diubah Pada Tanggal</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=date('d M Y H:i:s', strtotime($data->updated_at));?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputPekerjaan" class="col-sm-3 col-xs-3 control-label">Terakhir Diubah</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->user_modify->username;?></span>
										</div>
									</div>
								</div>
							<?php
								endif;
							?>
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
@endsection
