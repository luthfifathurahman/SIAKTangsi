<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Penduduk Pindah';
	$breadcrumb[1]['url'] = url('backend/pindah');
	$breadcrumb[2]['title'] = 'Tambah';
	$breadcrumb[2]['url'] = url('backend/pindah/tambah');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Ubah';
		$breadcrumb[2]['url'] = url('backend/pindah/'.$data[0]->id.'/Ubah');
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
    <?=$mode;?> Data Penduduk Pindah
@endsection

<!-- CONTENT -->
@section('content')
    <?php
        $no_kk = old('no_kk');
        $nik = old('nik');
        $nama = old('nama');
		$jenkel_id = old('jenkel_id');
        $tanggal = date('d-m-Y');
		$method = "POST";
		$mode = "Tambah";
		$url = "backend/pindah/";
		if (isset($data)){
            $no_kk = $data[0]->no_kk;
            $nik = $data[0]->nik;
            $nama = $data[0]->nama;
			$jenkel_id = $data[0]->jenkel_id;
			$tanggal = date('d-m-Y',strtotime($data[0]->tanggal));
			$method = "PUT";
			$mode = "Ubah";
			$url = "backend/pindah/".$data[0]->id;
		}
	?>

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class='content-header'>
			<h1>
				<?=$mode;?> Data Penduduk Pindah
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
								<center><h3><?=$mode;?> Data Pindah</h3></center>
							</div>
							<br><br>

							{{ Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) }}
								{{ csrf_field() }}
								<div class="box-body">
                                    <div class="form-group">
										<label for="inputNo_KK" class="col-sm-4 col-xs-4 control-label">No. KK</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" class="form-control" required="required" placeholder="No. KK" id="inputNo_KK" name="no_kk" value="<?=$no_kk;?>">
										</div>
									</div>
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
										<label for="inputTanggal" class="col-sm-4 col-xs-4 control-label">Tanggal Pindah</label>
										<div class="col-sm-6 col-xs-8">
                                            <div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="tanggal" value="<?=$tanggal?>">
											</div>
										</div>
									</div>

								<div class="box-footer">
									<a href="<?=url('/backend/meninggal')?>" class="btn btn-warning">Cancel</a>
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