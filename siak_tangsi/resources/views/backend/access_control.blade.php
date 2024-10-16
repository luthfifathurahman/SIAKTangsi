<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Access Control';
	$breadcrumb[1]['url'] = url('backend/access-control');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Access Control')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
	<section class="content-header">
		<h1>
            Access Control
        </h1>
		@include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
	</section>
	<br>
	<section class="content">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="box box-info">
					<div class="box-header">
						<div class="col-lg-8 col-md-6 col-xs-4">
							<h1 class="box-title">User Level</h1>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						@include('backend.elements.notification')
						<table id="example1" class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Level</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($user_level as $data):
								?>
									<tr>
										<td><?=$data->id;?></td>
										<td><?=$data->name;?></td>
										<td><button class="btn btn-primary btn-control" data-id=<?=$data->id;?>>Edit</button></td>
									</tr>
								<?php
									endforeach;
								?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
			</div>

			<div class="col-sm-6 col-xs-12">
				<div class="box box-info">
					<?php
						foreach ($user_level as $data):
					?>
					<div id="module-<?=$data->id;?>" class="hide module">
						<div class="box-header">
							<div class="col-lg-8 col-md-6 col-xs-4">
								<h1 class="box-title"><?=$data->name;?></h1>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							@include('backend.elements.notification')
							{{ Form::open(['url' => 'backend/access-control', 'method' => 'POST','class' => 'form-horizontal form-label-left']) }}
								{{ csrf_field() }}
								<input type="hidden" name="user_level" value=<?=$data->id;?>>
								<table id="example2" class="table table-hover">
									<thead>
										<tr>
											<th align="center">Modul</th>
											<th align="center">View</th>
											<th align="center">View + Update</th>
											<th align="center">All</th>
											
										</tr>
									</thead>
									<?php
										foreach ($module as $data_module):
										$checked_v = "";
										$checked_vu = "";
										$checked_a = "";
										
										if (!empty($access_control)){
											if ((isset($access_control[$data->id][$data_module->id])) && ($access_control[$data->id][$data_module->id] == "v")){
												$checked_v = "checked";
											} else 
											if ((isset($access_control[$data->id][$data_module->id])) && ($access_control[$data->id][$data_module->id] == "vu")){
												$checked_vu = "checked";
											} else 
											if ((isset($access_control[$data->id][$data_module->id])) && ($access_control[$data->id][$data_module->id] == "a")){
												$checked_a = "checked";
											} 
										}
									?>
										<tr>
											<td><?=$data_module->name;?></td>
											<td>
												<input required="required" type="radio" name="access_<?=$data_module->id;?>" value="v" <?=$checked_v;?>>
											</td>
											<td>
												<input required="required" type="radio" name="access_<?=$data_module->id;?>" value="vu" <?=$checked_vu;?>>
											</td>
											<td>
												<input required="required" type="radio" name="access_<?=$data_module->id;?>" value="a" <?=$checked_a;?>>
											</td>
											
										</tr>
									<?php
										endforeach;
									?>
								</table>
								<div class="form-group row">
									<div class="col-sm-5 offset-sm-6 text-right col-xs-12">
										<button type="submit" class="btn btn-primary btn-block">Submit </button>
										<br/>
									</div>
								</div>
							{{ Form::close() }}
						</div>
						<!-- /.box-body -->
					</div>
					<?php
						endforeach;
					?>
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
<script>
	$('.btn-control').on('click', function(e){
		var id = $(this).data('id');
		$('.module').addClass('hide');
		$('#module-'+id).removeClass('hide');
	});
</script>
@endsection
