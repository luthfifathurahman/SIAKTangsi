<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
	$breadcrumb[1]['title'] = 'Statistik Penduduk Meninggal';
	$breadcrumb[1]['url'] = url('backend/statistik-meninggal');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Statistik Penduduk Meninggal')

<!-- CONTENT -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Statistik Penduduk Meninggal
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
                            <h3><center>Statistik Penduduk Meninggal</center> </h3>
                        </div>
                        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <table id="pindah" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 40px"><center>No</center></th>
                                                <th><center>Jenis Kelamin</center></th>
                                                <th colspan='2'><center>2019</center></th>
                                                <th colspan='2'><center>2020</center></th>
                                                <th colspan='2'><center>2021</center></th>
                                            </tr>
                                        </thead>
                                        @foreach ($meninggal as $m)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            
                                            <td>{{ $m->jenkell }}</td>
                                            
                                            <td style="width: 80px">{{ $m->count19 }}</td>
                                            <td style="width: 100px">{{ $m->persen19 }} %</td>
                                            <td style="width: 80px">{{ $m->count20 }}</td>
                                            <td style="width: 100px">{{ $m->persen20 }} %</td>
                                            <td style="width: 80px">{{ $m->count21 }}</td>
                                            <td style="width: 100px">{{ $m->persen21 }} %</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan='2'><center>Total</center></th>
                                            <th style="width: 80px">{{ $m->total19 }}</th>
                                            <th style="width: 100px">{{ $m->persen_total19 }} %</th>
                                            <th style="width: 80px">{{ $m->total20 }}</th>
                                            <th style="width: 100px">{{ $m->persen_total20 }} %</th>
                                            <th style="width: 80px">{{ $m->total21 }}</th>
                                            <th style="width: 100px">{{ $m->persen_total21 }} %</th>
                                        </tr>
                                    </table>
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