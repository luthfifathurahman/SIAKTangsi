<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data Penduduk';
	$breadcrumb[1]['url'] = url('backend/penduduk');
	$breadcrumb[2]['title'] = 'Lihat Data Penduduk';
	$breadcrumb[2]['url'] = url('backend/penduduk/'.$data[0]->id);
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
					<div class="box box-info">
						<div class="container-fluid mb-5">
							<div class="box-header with-border">
								<center><h3>Lihat Data Penduduk</h3></center>
							</div>
							<?php
								if (!empty($data)):
									$data = $data[0];
							?>
								<div class="box-body">
									<div class="row">
										<div class="col-lg-10 col-md-9 col-xs-8"></div>
										<div class="col-lg-2 col-md-3 col-xs-4">
											<a href="/backend/penduduk" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
										</div>
									</div>
									<br><br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputNIK" class="col-sm-3 col-xs-3 control-label">NIK</label>
										<div class="col-sm-6 col-xs-6">
											<span><?=$data->nik;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputNama" class="col-sm-3 col-xs-3 control-label">Nama</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->nama;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputTempat" class="col-sm-3 col-xs-3 control-label">Tempat / Tanggal Lahir</label>
										<div class="col-sm-3 col-xs-3">
											<span><?=$data->tempat;?>,  <?=date('d M Y', strtotime($data->tgl_lahir));?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputJenkel" class="col-sm-3 col-xs-3 control-label">Jenis Kelamin</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->jenkel->jenkel;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputGoldar" class="col-sm-3 col-xs-3 control-label">Golongan Darah</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->goldar->goldar;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputKewarganegaraan" class="col-sm-3 col-xs-3 control-label">Kewarganegaraan</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->kewarganegaraan->kewarganegaraan;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputAgama" class="col-sm-3 col-xs-3 control-label">Agama</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->agama->agama;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputPendidikan" class="col-sm-3 col-xs-3 control-label">Pendidikan</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->pendidikan->pendidikan;?></span>
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-3 xs-3"></div>
										<label for="inputPekerjaan" class="col-sm-3 col-xs-3 control-label">Pekerjaan</label>
										<div class="col-sm-6 col-xs-8">
											<span><?=$data->pekerjaan->pekerjaan;?></span>
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
