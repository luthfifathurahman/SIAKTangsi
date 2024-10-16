<!-- Navbar -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?=$avatar;?>" class="user-image" alt="User Image">
                    <span class="hidden-xs"><?=$userinfo['firstname']." ".$userinfo['lastname']?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?=$avatar;?>" class="img-circle" alt="User Image">
                        <p>
                            <?=$userinfo['firstname']." ".$userinfo['lastname']?>
                        </p>
                    </li>
                    <!-- Menu Footer -->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="<?=url('backend/users-user/'.$userinfo['user_id'])?>" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href=" {{ url('backend/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->