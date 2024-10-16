<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data Penduduk';
	$breadcrumb[1]['url'] = url('backend/penduduk');
	$breadcrumb[2]['title'] = 'Tambah';
	$breadcrumb[2]['url'] = url('backend/penduduk/tambah');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Ubah';
		$breadcrumb[2]['url'] = url('backend/penduduk/'.$data[0]->id.'/ubah');
	}
?>

@if(Session::has('errors'))
	<?php 
		$errors = Session::get('errors'); 
	?>
@endif

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title')
	<?php
		$mode = "Tambah";
		if (isset($data)){
			$mode = "Ubah";
		}
	?>
    <?=$mode;?> Data Penduduk 
@endsection

<!-- CONTENT -->
@section('content')
    <?php
        $nik = old('nik');
        $nama = old('nama');
        $tempat = old('tempat');
        $tgl_lahir = date('d-m-Y');
        $jenkel_id = old('jenkel_id');
        $agama_id = old('agama_id');
        $kewarganegaraan_id = old('kewarganegaraan_id');
		$goldar_id = old('goldar_id');
        $pendidikan_id = old('pendidikan_id');
		$pekerjaan_id = old('pekerjaan_id');
		$method = "POST";
		$mode = "Tambah";
		$url = "backend/penduduk/";
		if (isset($data)){
            $nik = $data[0]->nik;
            $nama = $data[0]->nama;
            $tempat = $data[0]->tempat;
			$tgl_lahir = date('d-m-Y',strtotime($data[0]->tgl_lahir));
			$jenkel_id =  $data[0]->jenkel_id;
			$agama_id = $data[0]->agama_id;
			$kewarganegaraan_id = $data[0]->kewarganegaraan_id;
			$goldar_id = $data[0]->goldar_id;
			$pendidikan_id = $data[0]->pendidikan_id;
			$pekerjaan_id = $data[0]->pekerjaan_id;
			$method = "PUT";
			$mode = "Ubah";
			$url = "backend/penduduk/".$data[0]->id;
		}
	?>

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class='content-header'>
			<h1>
				<?=$mode;?> Data Penduduk
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
								<center><h3><?=$mode;?> Data Penduduk</h3></center>
							</div>
							<br><br>

							{{ Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) }}
								{{ csrf_field() }}
								<div class="box-body">
									<div class="form-group">
										<label for="inputNIK" class="col-sm-4 col-xs-4 control-label">NIK</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" class="form-control" required="required" placeholder="NIK" id="inputNIK" name="nik" value="<?=$nik;?>">
											<span class="error">
												<?php
													if (isset($errors)){
														echo $errors->first('nik');
													}
												?>
											</span>
										</div>
									</div>
									<div class="form-group">
										<label for="inputNama" class="col-sm-4 col-xs-4 control-label">Nama</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" class="form-control" required="required" placeholder="Nama" id="inputNama" name="nama" value="<?=$nama;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="inputTempat" class="col-sm-4 col-xs-4 control-label">Tempat / Tanggal Lahir</label>
										<div class="col-sm-3 col-xs-4">
											<input type="text" class="form-control" required="required" placeholder="Tempat Lahir" id="inputTempat" name="tempat" value="<?=$tempat;?>">
										</div>
										<div class="col-sm-3 col-xs-4">
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="tgl_lahir" value="<?=$tgl_lahir?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputJenkel" class="col-sm-4 col-xs-4 control-label">Jenis Kelamin</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'jenkel_id',
													$jenkel,
													$jenkel_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Jenis Kelamin'
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputGoldar" class="col-sm-4 col-xs-4 control-label">Golongan Darah</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'goldar_id',
													$goldar,
													$goldar_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Golongan Darah'
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputKewarganegaraan" class="col-sm-4 col-xs-4 control-label">Kewarganegaraan</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'kewarganegaraan_id',
													$kewarganegaraan,
													$kewarganegaraan_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Kewarganegaraan'
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputAgama" class="col-sm-4 col-xs-4 control-label">Agama</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'agama_id',
													$agama,
													$agama_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Agama'
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputPendidikan" class="col-sm-4 col-xs-4 control-label">Pendidikan</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'pendidikan_id',
													$pendidikan,
													$pendidikan_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Pendidikan'
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputPekerjaan" class="col-sm-4 col-xs-4 control-label">Pekerjaan</label>
										<div class="col-sm-6 col-xs-8">
											{{ 
												Form::select(
													'pekerjaan_id',
													$pekerjaan,
													$pekerjaan_id,
													array(
														'class' => 'form-control',
														'placeholder' => 'Pilih Pekerjaan'
													))
											}}
										</div>
									</div>
								</div>

								<div class="box-footer">
									<a href="<?=url('/backend/penduduk')?>" class="btn btn-warning">Cancel</a>
									<button type="submit" class="btn btn-info pull-right btnsubmit">Submit</button>
								</div>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
@endsection

<!-- CSS -->
@section('css')
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?=url('asset/bower_components/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css');?>">
@endsection

<!-- JAVASCRIPT -->
@section('script')
    
<!-- datepicker -->
    <script src="<?=url('asset/bower_components/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js');?>"></script>
	<script>
		    //Date picker
		$('#datepicker').datetimepicker({
			format: 'DD-MM-YYYY'
		});

	</script>
@endsection