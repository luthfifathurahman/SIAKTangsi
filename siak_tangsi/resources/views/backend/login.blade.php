@extends('backend.layouts.login')

@section('title', 'Login')

@section('content')
    <div>
        <div class="login-clean">
            <form method="post" id="formLogin">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div>
                    <center><img src="<?=url(getData('logo'));?>" class="img-responsive" style="max-width:100px;"></center>
                </div>
                <br>
                <div>
                    <h1><center><label class="control-label"><?=getData('web_description');?></label></center></h1>
                </div>
                <br>
                <div class="error-alert"></div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required="" name="email" >
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-submit btn-primary ladda-button btn-block">Login</button> 
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <div class="clearfix"></div>
                    <div>
                        <p><center>&copy;2021 <b>Version</b> 1.0.1 <strong>All rights reserved.</strong></center></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection