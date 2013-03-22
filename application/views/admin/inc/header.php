<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo url('admin/dashboard')?>">Title</a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="<?php echo ( URI::is('admin/dashboard') ? 'active' : false )?>"><a href="<?php echo url('admin/dashboard')?>">Home</a></li>
				
					<li class="<?php echo ( URI::segment(2) == 'users' || URI::segment(2) == 'roles' ? 'active' : false )?>"><a href="<?php echo url('admin/users')?>">Users &amp; Roles</a></li>
				</ul>
				<ul class="nav pull-right">
					<li><a href="<?php echo url('')?>">Site <i class="icon-home"></i></a></li>
					<li><a href="<?php echo url('admin/logout')?>">Logout <i class="icon-off"></i></a></li>
			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
