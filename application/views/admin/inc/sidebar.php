<ul class="nav nav-list">
	<li class="nav-header">Website Frontend</li>
	<li class="<?php echo ( URI::segment(2) == 'users' ? 'active' : false )?>"><a href="<?php echo url('admin/users')?>"><i class="icon-user"></i> Users</a></li>
	<li class="<?php echo ( URI::segment(2) == 'roles' ? 'active' : false )?>"><a href="<?php echo url('admin/roles')?>"><i class="icon-cog"></i> Roles</a></li>
</ul>