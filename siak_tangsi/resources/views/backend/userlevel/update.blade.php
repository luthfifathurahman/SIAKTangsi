<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'User Level';
	$breadcrumb[1]['url'] = url('backend/users-level');	
	$breadcrumb[2]['title'] = 'Add';
	$breadcrumb[2]['url'] = url('backend/users-level/create');
	if (isset($data)){
		$breadcrumb[2]['title'] = 'Edit';
		$breadcrumb[2]['url'] = url('backend/users-level/'.$data[0]->id.'/edit');
	}
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title')
	<?php
		$mode = "Create";
		if (isset($data)){
			$mode = "Edit";
		}
	?>
    <?=$mode;?> User Level 
@endsection

<!-- CONTENT -->
@section('content')
	<?php
		$name = old('name');
		$active = 1;
		$method = "POST";
		$mode = "Create";
		$url = "backend/users-level/";
		if (isset($data)){
			$name = $data[0]->name;
			$active = $data[0]->active;
			$method = "PUT";
			$mode = "Edit";
			$url = "backend/users-level/".$data[0]->id;
		}
	?>

	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class='content-header'>
			<h1>
				<?=$mode;?> User Level 
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
								<center><h3><?=$mode;?> User Level</h3></center>
							</div>
							<br><br>
							{{ Form::open(['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) }}
								{{ csrf_field() }}
								<div class="box-body">
									<div class="form-group">
										<label for="inputNIK" class="col-sm-4 col-xs-4 control-label">Level <span class="required">*</span>: </label>
										<div class="col-sm-6 col-xs-8">
											<input type="text" id="name" name="name" required="required" class="form-control" value="<?=$name;?>" autofocus>
										</div>
									</div>
									<div class="form-group">
										<label for="inputNama" class="col-sm-4 col-xs-4 control-label">Status: </label>
										<div class="col-sm-4 col-xs-6">
											{{
												Form::select(
													'active',
													['1' => 'Active', '2' => 'Deactive'],
													$active,
													array(
														'class' => 'form-control',
													))
											}}
										</div>
									</div>
								</div>

								<div class="box-footer">
									<a href="<?=url('/backend/users-level')?>" class="btn btn-warning">Cancel</a>
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

@endsection

<!-- JAVASCRIPT -->
@section('script')

@endsection