<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Setting';
	$breadcrumb[1]['url'] = url('backend/setting');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Setting')

<!-- CONTENT -->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Setting
        </h1>
        @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- card -->
                <div class="box box-info">
                    <div class="container-fluid mb-5">
                        <div class="box-header with-border">
                            <h3><center>Setting</center></h3>
                        </div>
                        @include('backend.elements.notification')
                        <!-- /.card-header -->
                        {{ Form::open(['url' => 'backend/setting', 'method' => 'POST','class' => 'form-horizontal', 'files' => true]) }}
                            {{ csrf_field() }}
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <!-- text input -->
                                    <label class="col-sm-4 col-xs-4 control-label">Website Title</label>
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" class="form-control" name="1" placeholder="Masukkan Nama Website" autocomplete="off" value="<?=getData('web_title')?>">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <!-- text input -->
                                    <label class="col-sm-4 col-xs-4 control-label">Website Description</label>
                                    <div class="col-sm-6 col-xs-8">
                                        <input type="text" class="form-control" name="4" placeholder="Masukkan Deskripsi Website" autocomplete="off" value="<?=getData('web_description')?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- textarea -->
                                    <label  class="col-sm-4 col-xs-4 control-label">Email Admin</label>
                                    <div class="col-sm-6 col-xs-8">
                                        <textarea class="form-control" rows="3" name="3" placeholder="Enter ..." ><?=getData('email_admin')?></textarea>
                                        <span class="text-help">
                                            If there is more than one email, use enter as delimiter<br/>
                                            Example :<br/>
                                            email_1<br/>
                                            email_2
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- text input -->
                                    <label class="col-sm-4 col-xs-4 control-label">Website Logo</label>
                                    <div class="col-sm-5 col-xs-4">
                                        <input type="file" name="logo" class="dropify" data-default-file="<?=url(getData('logo'))?>"/>
                                        <input type="hidden" name="default_logo" value=<?=url(getData('logo'))?>>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="box-footer">
                                <div class="col-sm-5 col-xs-5"></div>
                                <div class="col-sm-3 col-xs-3"> <center><button type="submit" class="btn btn-primary btn-block col-md-3">Submit </button></center>
                                </div>
                                
                            </div>
                        {{ Form::close() }}
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>
@endsection

<!-- CSS -->
@section('css')
    <link href="<?=url('asset/bower_components/dropify/css/dropify.min.css');?>" rel="stylesheet">
@endsection

<!-- JAVASCRIPT -->
@section('script')
    <script src="<?=url('asset/bower_components/dropify/js/dropify.js');?>"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection