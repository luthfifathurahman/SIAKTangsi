<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'User';
	$breadcrumb[1]['url'] = url('backend/users-user');	
	$breadcrumb[2]['title'] = 'Tambah';
	$breadcrumb[2]['url'] = url('backend/users-user/tambah');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Ubah';
		$breadcrumb[2]['url'] = url('backend/users-user/'.$data[0]->id.'/ubah');
	}
?>

<?php
	$cover_1 = [];
	if (isset($data)){
		$cover_1 = $data[0];
		$cover_1->field = 'avatar_id';
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
    <?=$mode;?> Data User 
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$firstname = old('firstname');
        $lastname = old('lastname');
        $birthdate = date('d-m-Y');
        $phone = old('phone');
        $address = old('address');
        $gender = old('gender');
		$email = old('email');
		$username = old('username');
		$avatar_id = old('avatar_id', 0);
		$active = 1;
		$method = "POST";
		$mode = "Tambah";
		$url = "backend/users-user";
		$user_level_id = 0;
		if (isset($data)){
			$firstname = $data[0]->firstname;
            $lastname = $data[0]->lastname;
            $birthdate = date('d-m-Y',strtotime($data[0]->birthdate));
            $phone = $data[0]->phone;
            $address = $data[0]->address;
            $gender = $data[0]->gender;
			$email = $data[0]->email;
			$username = $data[0]->username;
			$avatar_id = $data[0]->avatar_id;
			$active = $data[0]->active;
			$user_level_id = $data[0]->user_level_id;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/users-user/".$data[0]->id;
		}
	?>

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class='content-header'>
			<h1>
				<?=$mode;?> Data User
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
								<center><h3><?=$mode;?> Data User</h3></center>
							</div>
							<br><br>
							{{ Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) }}
								{{ csrf_field() }}
								<div class="box-body">
									<div class="form-group">
										<label for="inputNIK" class="col-sm-4 col-xs-4 control-label">Nama Depan</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" id="firstname" name="firstname" class="form-control" placeholder="Nama Depan" value="<?=$firstname;?>" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="inputNama" class="col-sm-4 col-xs-4 control-label">Nama Belakang</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Nama Belakang" value="<?=$lastname;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAvatar" class="col-sm-4 col-xs-4 control-label">Avatar</label>
										<div class="col-sm-6 col-xs-8">
											<input type="hidden" name="avatar_id" value=<?=$avatar_id;?> id="id-cover-image_1">
											@include('backend.elements.change_cover',array('cover' => $cover_1, 'id_count' => 1))
										</div>
									</div>
									<div class="form-group">
										<label for="inputUsername" class="col-sm-4 col-xs-4 control-label">Username</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" id="username" name="username" required="required" class="form-control" value="<?=$username;?>">
											<span class="error">
												<?php
													if (isset($errors)){
														echo $errors->first('username');
													}
												?>
											</span>
										</div>
									</div>
									<div class="form-group">
										<label for="inputEmail" class="col-sm-4 col-xs-4 control-label">Email</label>
										<div class="col-sm-6 col-xs-8">
											<input type="email" id="email" name="email" required="required" class="form-control" value="<?=$email;?>">
											<span class="error">
												<?php
													if (isset($errors)){
														echo $errors->first('email');
													}
												?>
											</span>
										</div>
									</div>
									<?php
										if ($mode == "Edit"):
									?>
									<div class="form-group">
										<label for="inputPassword" class="col-sm-4 col-xs-4 control-label">Password<br/><small>default 123456</small></label>
										<div class="col-sm-6 col-xs-8">
											<input type="password" id="password" name="password" class="form-control hide">
											<input type="checkbox" id="password_check" name="password_check" value="1">
											Change Password
										</div>
									</div>
									<?php
										endif;
									?>
									<div class="form-group">
										<label for="inputUserLevel" class="col-sm-4 col-xs-4 control-label">Level User</label>
										<div class="col-sm-4 col-xs-6">
											{{
												Form::select(
													'user_level_id',
													$userlevel,
													$user_level_id,
													array(
														'class' => 'form-control',
													))
											}}
										</div>
									</div>
									<div class="form-group">
										<label for="inputTanggal" class="col-sm-4 col-xs-4 control-label">Tanggal Lahir</label>
										<div class="col-sm-4 col-xs-6">
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type='text' class="form-control pull-right" id="datepicker" name="birthdate" value="<?=$birthdate?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="inputJenkel" class="col-sm-4 col-xs-4 control-label">Jenis Kelamin</label>
										<div class="col-sm-4 col-xs-6">
											{{
												Form::select(
													'gender',
													['male' => 'Pria', 'female' => 'Wanita', 'other' => 'Lainnya'],
													$gender,
													array(
														'class' => 'form-control',
													))
											}}		
										</div>
									</div>
									<div class="form-group">
										<label for="inputNoHP" class="col-sm-4 col-xs-4 control-label">No. HP</label>
										<div class="col-sm-4 col-xs-6">
											<input type="text" name="phone" class="form-control" value="<?=$phone;?>">
										</div>
									</div>
									<div class="form-group">
										<label for="inputAlamat" class="col-sm-4 col-xs-4 control-label">Alamat</label>
										<div class="col-sm-6 col-xs-8">
											<textarea name="alamat" id="alamat" rows="3" class="form-control col-md-7 col-xs-12"><?=$address;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="inputPendidikan" class="col-sm-4 col-xs-4 control-label">Status</label>
										<div class="col-sm-6 col-xs-8">
											{{
												Form::select(
													'active',
													['1' => 'Active', '2' => 'Banned', '3' => 'Non Active'],
													$active,
													array(
														'class' => 'form-control',
													))
											}}
										</div>
									</div>
								</div>

								<div class="box-footer">
									<a href="<?=url('/backend/users-user')?>" class="btn btn-warning">Cancel</a>
									<button type="submit" class="btn btn-primary pull-right">Submit </button>
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
	
	<script>
		$("#password_check").on("change", function(){
			if($(this).prop('checked') == true){
				$("#password").removeClass("hide");
				$("#password").prop('required',true);
			} else {
				$("#password").addClass("hide");
				$("#password").prop('required',false);
			}
		});
        
	</script>
	
	@include('backend.partials.colorbox')	
@endsection