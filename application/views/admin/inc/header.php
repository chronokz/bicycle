<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo url('admin/dashboard')?>"><?php echo ADMIN_TITLE?></a>
			<div class="nav-collapse">
				<ul class="nav">
					<li class="<?php echo ( URI::is('admin/dashboard') ? 'active' : false )?>"><a href="<?php echo url('admin/dashboard')?>">Home</a></li>
					<li class="<?php echo ( URI::segment(2) == 'news' ? 'active' : false )?>"><a href="<?php echo url('admin/news')?>">News</a></li>
					<li class="<?php echo ( URI::segment(2) == 'gallery' || URI::segment(2) == 'images' ? 'active' : false )?>"><a href="<?php echo url('admin/gallery')?>">Galleries</a></li>
					<li class="<?php echo ( URI::segment(2) == 'pages' || URI::segment(2) == 'sections' ? 'active' : false )?>"><a href="<?php echo url('admin/pages')?>">Pages</a></li>
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
