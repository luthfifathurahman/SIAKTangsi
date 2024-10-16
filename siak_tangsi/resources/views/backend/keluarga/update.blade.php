<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data Keluarga';
	$breadcrumb[1]['url'] = url('backend/keluarga');	
	$breadcrumb[2]['title'] = 'Tambah';
	$breadcrumb[2]['url'] = url('backend/keluarga/tambah');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Ubah';
		$breadcrumb[2]['url'] = url('backend/keluarga/'.$data[0]->id.'/edit');
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
    <?=$mode;?> Data Keluarga 
@endsection

<!-- CONTENT -->
@section('content')
	<?php
        $no_kk = old('no_kk');
        $nama = old('nama');
        $alamat = old('alamat');
		$method = "POST";
		$mode = "Tambah";
		$url = "backend/keluarga/";
		if (isset($data)){
            $no_kk = $data[0]->no_kk;
            $nama = $data[0]->nama;
            $alamat = $data[0]->alamat;
			$method = "PUT";
			$mode = "Ubah";
			$url = "backend/keluarga/".$data[0]->id;
		}
	?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class='content-header'>
            <h1>
                <?=$mode;?> Data Keluarga
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
                                <center><h3><?=$mode;?> Data Keluarga</h3></center>
                            </div>
                            <br><br>

                            {{ Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) }}
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputKK" class="col-sm-4 col-xs-4 control-label">No. KK</label>
                                        <div class="col-sm-6 col-xs-8">
                                            <input type="text" class="form-control" placeholder="No. KK" id="inputKK" name="no_kk" value="<?=$no_kk;?>">
                                            <span class="error">
												<?php
													if (isset($errors)){
														echo $errors->first('no_kk');
													}
												?>
											</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNama" class="col-sm-4 col-xs-4 control-label">Nama</label>
                                        <div class="col-sm-6 col-xs-8">
                                            <input type="text" class="form-control" placeholder="Nama" id="inputnama" name="nama" value="<?=$nama;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAlamat" class="col-sm-4 col-xs-4 control-label">Alamat</label>
                                        <div class="col-sm-6 col-xs-8">
                                            <textarea name="alamat" id="alamat" rows="3" class="form-control col-md-7 col-xs-12"><?=$alamat;?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <a href="<?=url('/backend/keluarga')?>" class="btn btn-warning">Cancel</a>
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

@endsection

<!-- JAVASCRIPT -->
@section('script')

@endsection