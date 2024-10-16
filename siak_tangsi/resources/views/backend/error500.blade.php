<!-- LAYOUT -->
@extends('backend.layouts.main')

<!-- TITLE -->
@section('title', 'Error 500')

<!-- CONTENT -->
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                500 Error Page
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <div class="error-page">
                            <h1 class="headline text-red">500</h1>
            
                            <div class="error-content">
                                <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>
            
                                <h3>
                                    We will work on fixing that right away.
                                    Meanwhile, you may <a href="/backend/dashboard">return to dashboard</a> 
                                </h3>
                            </div>
                        </div>
                        <!-- /.error-page -->
                    </div>
                </div>
            </div>
            <br>
            <br>

        </section>
        <!-- /.content -->
    </div>
@endsection
