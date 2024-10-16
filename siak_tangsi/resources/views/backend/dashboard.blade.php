<?php
	$breadcrumb = [];
	$breadcrumb[0]['title'] = 'Dashboard';
	$breadcrumb[0]['url'] = url('backend/dashboard');
?>

<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Dashboard')


<!-- CONTENT -->
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            @include('backend.elements.breadcrumb',array('breadcrumb' => $breadcrumb))
        </section>
        <!-- /.content-header -->
        
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{ $total_penduduk->total_penduduk }}</h3>

                        <p>Data Penduduk</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user"></i>
                        </div>
                        <a href="/backend/penduduk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{ $total_keluarga->total_keluarga }}</h3>

                        <p>Data Keluarga</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-users"></i>
                        </div>
                        <a href="/backend/keluarga" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{ $total_pindah->total_pindah }}</h3>

                        <p>Data Penduduk Pindah</p>
                        </div>
                        <div class="icon">
                        <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/backend/pindah" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3>{{ $total_meninggal->total_meninggal }}</h3>

                        <p>Data Penduduk Meninggal</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-times"></i>
                        </div>
                        <a href="/backend/meninggal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                    <div class="box box-danger">
                        <div class="box-header with-border">

                        </div>
                        <div class="box-body chart-responsive " style="height: 300px;">
                            <br>
                            <br>
                            <h2><center>Selamat Datang <?=$userinfo['firstname']." ".$userinfo['lastname']?></center> </h2>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.Left col -->

                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Donut chart -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Statistik Penduduk (Jenis Kelamin)</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="donut-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </section>
                <!-- right col -->
            </div>
        </section>
    </div>
@endsection

@section('css')
@endsection

@section('script')
    <!-- FLOT CHARTS -->
<script src="<?=url('asset/bower_components/Flot/jquery.flot.js')?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=url('asset/bower_components/Flot/jquery.flot.resize.js')?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=url('asset/bower_components/Flot/jquery.flot.pie.js')?>"></script>


<script>
    $(function () {
        /*
        * DONUT CHART
        * -----------
        */

        var donutData = [
        { label: 'Perempuan', data: <?php echo json_encode($jumlah_puan); ?>, color: '#3c8dbc' },
        { label: 'Laki-laki', data:<?php echo json_encode($jumlah_laki); ?>, color: '#f56954' },

        ]
        $.plot('#donut-chart', donutData, {
        series: {
            pie: {
            show       : true,
            radius     : 1,
            innerRadius: 0.5,
            label      : {
                show     : true,
                radius   : 2 / 3,
                formatter: labelFormatter,
                threshold: 0.1
            }

            }
        },
        legend: {
            show: false
        }
        })
        /*
        * END DONUT CHART
        */
    })
    
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + '<br>'
        + Math.round(series.percent) + '%</div>'
    }
</script>
@endsection