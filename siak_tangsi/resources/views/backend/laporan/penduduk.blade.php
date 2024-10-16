<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Statistik Penduduk';
	$breadcrumb[1]['url'] = url('backend/statistik-penduduk');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Statistik Penduduk')

<!-- CONTENT -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Statistik Penduduk
            </h1>
            @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
        </section>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3><center>Statistik Penduduk</center> </h3>
                        </div>
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_1" data-toggle="tab">Jenis Kelamin</a></li>
                                            <li><a href="#tab_2" data-toggle="tab">Agama</a></li>
                                            <li><a href="#tab_3" data-toggle="tab">Warga Negara</a></li>
                                            <li><a href="#tab_4" data-toggle="tab">Golongan Darah</a></li>
                                            <li><a href="#tab_5" data-toggle="tab">Pendidikan</a></li>
                                            <li><a href="#tab_6" data-toggle="tab">Pekerjaan</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            
                                            
                                            @include('backend.laporan.penduduk.jenkel')

                                            @include('backend.laporan.penduduk.agama')

                                            @include('backend.laporan.penduduk.kewarganegaraan')

                                            @include('backend.laporan.penduduk.goldar')

                                            @include('backend.laporan.penduduk.pendidikan')

                                            @include('backend.laporan.penduduk.pekerjaan')

                                        </div>
                                        <!-- /.tab-content -->
                                    </div>
                                    <!-- /.nav-tabs-custom -->
                                </div>
                                <!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('css')
@endsection

@section('script')
@endsection