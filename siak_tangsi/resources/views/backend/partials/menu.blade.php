	<?php
		$segment =  Request::segment(2);
		$sub_segment =  Request::segment(3);
	?>


<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
			<img src="<?=$avatar;?>" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
			<p><?=$userinfo['firstname']." ".$userinfo['lastname']?></p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">MAIN NAVIGATION</li>
			
			<li class="{{ ($segment == 'dashboard' ? 'active' : '') }}">
				<a href="<?=url('backend/dashboard');?>">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					<span class="pull-right-container"></span>
				</a>
			</li>

			<li class="header">KEPENDUDUKAN</li>
			
			<li class="{{ ($segment == 'penduduk' ? 'active' : '') }}">
				<a href="<?=url('backend/penduduk');?>">
					<i class="fa fa-user"></i> <span>Data Penduduk</span> 
					<span class="pull-right-container"></span>
				</a>
			</li>
			<li class="{{ ($segment == 'keluarga' ? 'active' : '') }}">
				<a href="<?=url('backend/keluarga');?>">
					<i class="fa fa-users"></i> <span> Data Keluarga </span>
					<span class="pull-right-container"></span>
				</a>
			</li>
			<li class="{{ ($segment == 'pindah' ? 'active' : '') }}">
				<a href="<?=url('backend/pindah');?>">
					<i class="ion ion-person-add"></i> <span>Data Penduduk Pindah </span>
					<span class="pull-right-container"></span>
				</a>
			</li>
			<li class="{{ ($segment == 'meninggal' ? 'active' : '') }}">
				<a href="<?=url('backend/meninggal');?>">
					<i class="fa fa-times"></i> <span>Data Penduduk Meninggal </span>
					<span class="pull-right-container"></span>
				</a>
			</li>

			<li class="header">STATISTIK</li>
			<li class="treeview {{ ((($segment == 'statistik-penduduk') || ($segment == 'statistik-pindah') || ($segment == 'statistik-meninggal')) ? 'active' : '') }}">
				<a href="#">
					<i class="fa fa-edit"></i>
					<span>Statistik</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu" style="{{ ((($segment == 'statistik-penduduk') || ($segment == 'statistik-pindah') || ($segment == 'statistik-meninggal')) ? 'display : block' : '') }}">
					<li class="{{ ($segment == 'statistik-penduduk' ? 'active' : '') }}">
						<a href="<?=url('backend/statistik-penduduk');?>">
							<i class="fa fa-circle-o"></i> Statistik Penduduk
						</a>
					</li>
					<li class="{{ ($segment == 'statistik-pindah' ? 'active' : '') }}">
						<a href="<?=url('backend/statistik-pindah');?>">
							<i class="fa fa-circle-o"></i> Statistik Penduduk Pindah
						</a>
					</li>
					<li class="{{ ($segment == 'statistik-meninggal' ? 'active' : '') }}">
						<a href="<?=url('backend/statistik-meninggal');?>">
							<i class="fa fa-circle-o"></i> Statistik Penduduk Meninggal
						</a>
					</li>
				</ul>
			</li>

			<li class="header">MEDIA LIBRARY</li>
			
			<li class="{{ ($segment == 'media-library' ? 'active' : '') }}">
				<a href="<?=url('backend/media-library');?>">
					<i class="fa fa-user"></i> <span>Media Library</span> 
					<span class="pull-right-container"></span>
				</a>
			</li>

			<li class="header">SISTEM</li>
			<li class="treeview {{ ((($segment == 'users-level') || ($segment == 'users-user')) ? 'active' : '') }}">
				<a href="#">
					<i class="fa fa-pie-chart"></i>
					<span>Membership</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>


				<ul class="treeview-menu" style="{{ ((($segment == 'users-level') || ($segment == 'users-user')) ? 'display : block' : '') }}">
					<li class="{{ ($segment == 'users-level' ? 'active' : '') }}">
						<a href="<?=url('backend/users-level');?>">
							<i class="fa fa-circle-o"></i> User Level
						</a>
					</li>
					<li class="{{ ($segment == 'users-user' ? 'active' : '') }}">
						<a href="<?=url('backend/users-user');?>">
							<i class="fa fa-circle-o"></i> Data User
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview {{ ((($segment == 'setting') || ($segment == 'modules') || ($segment == 'access-control')) ? 'active' : '') }}">
				<a href="#">
					<i class="fa fa-cog"></i>
					<span>Sistem Admin</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>

				<ul class="treeview-menu" style="{{ ((($segment == 'setting') || ($segment == 'modules') || ($segment == 'access-control')) ? 'display : block' : '') }}">
					<li class="{{ ($segment == 'setting' ? 'active' : '') }}">
						<a href="<?=url('backend/setting');?>">
							<i class="fa fa-circle-o"></i> Setting
						</a>
					</li>
					<?php
						// SUPER ADMIN //
						if ($userinfo['user_level_id'] == 1):
					?>
					<li class="{{ ($segment == 'modules' ? 'active' : '') }}">
						<a href="<?=url('backend/modules');?>">
							<i class="fa fa-circle-o"></i> Modules
						</a>
					</li>
					<?php
						endif;
					?>
					<li class="{{ ($segment == 'access-control' ? 'active' : '') }}">
						<a href="<?=url('backend/access-control');?>">
							<i class="fa fa-circle-o"></i> Access Control
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>