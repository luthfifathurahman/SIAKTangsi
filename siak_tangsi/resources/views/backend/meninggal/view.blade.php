<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data Penduduk Meninggal';
	$breadcrumb[1]['url'] = url('backend/meninggal');
	$breadcrumb[2]['title'] = 'Lihat Data Penduduk Meninggal';
	$breadcrumb[2]['url'] = url('backend/meninggal/'.$data[0]->id);
?>


<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Data Penduduk Meninggal')

<!-- CONTENT -->
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
            <h1>
                Data Penduduk Meninggal
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
								<center><h3>Lihat Data Penduduk Meninggal</h3></center>
							</div>
							<?php
								if (!empty($data)):
									$data = $data[0];
							?>
							<div class="box-body">
								<div class="row">
									<div class="col-lg-10 col-md-9 col-xs-8"></div>
									<div class="col-lg-2 col-md-3 col-xs-4">
										<a href="/backend/meninggal" class="btn btn-block btn-danger"><i class="fa fa-arrow-left mr-1"></i> Kembali</a>
									</div>
								</div>
								<br><br>
                                <div class="form-group">
                                    <div class="col-sm-4 col-xs-4"></div>
                                    <label for="inputNoKK" class="col-sm-2 col-xs-2 control-label">No. KK</label>
                                    <div class="col-sm-4 col-xs-4">
                                        <span><?=$data->no_kk;?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-4 col-xs-4"></div>
                                    <label for="inputNIK" class="col-sm-2 col-xs-2 control-label">NIK</label>
                                    <div class="col-sm-4 col-xs-4">
                                        <span><?=$data->nik;?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-4 col-xs-4"></div>
                                    <label for="inputNama" class="col-sm-2 col-xs-2 control-label">Nama</label>
                                    <div class="col-sm-4 col-xs-4">
                                        <span><?=$data->nama;?></span>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-4 col-xs-4"></div>
                                    <label for="inputTanggal" class="col-sm-2 col-xs-2 control-label">Tanggal Meninggal</label>
                                    <div class="col-sm-4 col-xs-4">
                                        <span><?=date('d M Y', strtotime($data->tanggal));?></span>
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