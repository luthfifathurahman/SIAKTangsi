<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Data User';
	$breadcrumb[1]['url'] = url('backend/users-users');
	$breadcrumb[2]['title'] = 'Lihat Data User';
	$breadcrumb[2]['url'] = url('backend/users-users/'.$data[0]->id);
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
                Data User
            </h1>
            @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
        </section>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-3">
					<!-- Profile Image -->
					<?php
						if (!empty($data)):
							$data = $data[0];
					?>
					<div class="box box-primary">
						<div class="box-body box-profile">
							
							<img class="profile-user-img img-responsive img-circle" src="<?=url('upload/img/thumbnails/'.$data->media_image_1->name.".".$data->media_image_1->type);?>" alt="User profile picture">

							<h3 class="profile-username text-center"><?=$data->firstname." ".$data->lastname;?></h3>
			
							<p class="text-muted text-center"><?=$data->level->name;?></p>
						</div>
					  <!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="box box-primary">
						<div class="container-fluid mb-5">
							<div class="box-header with-border">
								<center><h3>Lihat Data User</h3></center>
							</div>
							<br><br>
							<div class="box-body">
								<div class="row">
									<div class="col-lg-2 col-md-3 col-xs-3">
										<a href="<?=url('backend/users-user/'.$data->id.'/ubah')?>" class="btn btn-block btn-info">
											<i class="fa fa-edit"></i> Ubah Data
										</a>
										
										
									</div>						
									<div class="col-lg-8 col-md-3 col-xs-3">
		
									</div>
									<div class="col-lg-2 col-md-3 col-xs-3">
										<a href="/backend/dashboard" class="btn btn-block btn-danger">
											<i class="fa fa-arrow-left mr-1"></i> Kembali
										</a>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputNama" class="col-sm-3 col-xs-3 control-label">Nama</label>
									<div class="col-sm-6 col-xs-6">
										<span><?=$data->firstname." ".$data->lastname;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputEmail" class="col-sm-3 col-xs-3 control-label">Email</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->email;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputLahir" class="col-sm-3 col-xs-3 control-label">Tanggal Lahir</label>
									<div class="col-sm-3 col-xs-3">
										<span><?=date('d M Y', strtotime($data->birthdate));?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputUsername" class="col-sm-3 col-xs-3 control-label">Username</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->username;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputLevel" class="col-sm-3 col-xs-3 control-label">Level</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->level->name;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputNoHP" class="col-sm-3 col-xs-3 control-label">No. HP</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->phone;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputAlamat" class="col-sm-3 col-xs-3 control-label">Alamat</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->address;?></span>
									</div>
								</div>
								<br>
								<div class="form-group">
									<div class="col-sm-3 xs-3"></div>
									<label for="inputGender" class="col-sm-3 col-xs-3 control-label">Gender</label>
									<div class="col-sm-6 col-xs-8">
										<span><?=$data->gender;?></span>
									</div>
								</div>
								<br><br>
							</div>
						</div>
					</div>
				</div>
				<?php
					endif;
				?>
				
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

