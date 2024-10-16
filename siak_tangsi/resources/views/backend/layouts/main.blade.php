<?php
	$userinfo = Session::get('userinfo');
	$avatar = url('img/noprofileimage.png');
	if (isset($userinfo['avatar'])){
		$avatar = url($userinfo['avatar']);
	}
	Session::put('access_control', getUserAccess($userinfo['user_level_id']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=getData('web_title');?> | Backend | @yield('title')</title>

    <link rel="apple-touch-icon" href="<?=url(getData('logo'));?>">
    <link rel="shortcut icon" href="<?=url(getData('logo'));?>">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=url('asset/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=url('asset/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- DataTables -->
	<link rel="stylesheet" href="<?=url('asset/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=url('asset/dist/css/AdminLTE.min.css');?>">
    
    <link href="<?=url('asset/bower_components/colorbox/colorbox.css');?>" rel="stylesheet">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=url('asset/dist/css/skins/_all-skins.min.css');?>">
    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            
            <!-- Logo -->
            <a href="<?=url('/backend/dashboard');?>" class="logo">
                
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="<?=url(getData('logo'));?>"; style="max-width: 60%"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="<?=url(getData('logo'));?>"; style="max-width: 20%"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            @include('backend.partials.navbar')
        </header>
        <!-- Left side column. contains the logo and sidebar -->

        @include('backend.partials.menu')

        @yield('content')


        <!-- Footer -->
        @include('backend.partials.footer')


    <!-- jQuery 3 -->
    <script src="<?=url('asset/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?=url('asset/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?=url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- Sparkline -->
    <script src="<?=url('asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?=url('asset/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=url('asset/bower_components/fastclick/lib/fastclick.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?=url('asset/dist/js/adminlte.min.js');?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=url('asset/dist/js/pages/dashboard.js');?>"></script>
    <!-- DataTables  & Plugins -->
	<script src="<?=url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?=url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <!-- Colorbox -->
    <script src="<?=url('asset/bower_components/colorbox/jquery.colorbox.js');?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script><script src="<?=url('asset/dist/js/demo.js');?>"></script>

    @yield('script')
</body>
</html>