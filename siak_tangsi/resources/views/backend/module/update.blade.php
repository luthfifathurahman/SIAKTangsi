<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Modules';
	$breadcrumb[1]['url'] = url('backend/modules');
	$breadcrumb[2]['title'] = 'Tambah';
	$breadcrumb[2]['url'] = url('backend/modules/tambah');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Ubah';
		$breadcrumb[2]['url'] = url('backend/modules/'.$data[0]->id.'/ubah');
	}
?>

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
    <?=$mode;?> Modules
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$name = old('name');
		$slug = old('slug');
		$active = 1;
		$method = "POST";
		$mode = "Tambah";
		$url = "backend/modules";
		if (isset($data)){
			$name = $data[0]->name;
			$slug = $data[0]->slug;
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/modules/".$data[0]->id;
		}
	?>


	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<?=$mode;?> Modules
			</h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box box-info">
						<div class="container-fluid mb-5">
							<div class="box-header with-border">
								<center><h3><?=$mode;?> Modules</h3></center>
							</div>
							<br><br>
							{{ Form::open(['url' => $url, 'method'=> $method, 'class' => 'form-horizontal'])}}
								{{ csrf_field() }}
								<div class="box-body">
									<div class="form-group">
										<label for="inputNama" class="col-sm-4 col-xs-4 control-label">Nama Modules</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" class="form-control" id="name" name="name" required="required" placeholder="Nama" value="<?=$name;?>" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="inputSlug" class="col-sm-4 col-xs-4 control-label">Slug</label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" class="form-control" id="slug" name="slug" required="required" placeholder="Slug" value="<?=$slug;?>" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="inputStatus" class="col-sm-4 col-xs-4 control-label">Status</label>
										<div class="col-sm-6 col-xs-8">
											{{
												Form::select(
													'active',
													['1' => 'Active', '2' => 'Deactive'],
													$active,
													array(
														'class' => 'form-control'
												))
											}}
										</div>
									</div>
									<br>
									<div class="ln_solid"></div>
									<div class="box-footer">
										<div class="col-sm-5 col-xs-5"></div>
										<div class="col-sm-1 col-xs-1">
											<a href="<?=url('/backend/modules')?>" class="btn btn-danger">Cancel</a>
										</div>
										<div class="col-sm-1 col-xs-1"> 
											<button type="submit" class="btn btn-primary pull right">Submit</button>
										</div>
									</div>
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