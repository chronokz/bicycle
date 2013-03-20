<ul class="nav nav-list">
	<li class="nav-header">Website Frontend</li>
	<li class="<?php echo ( URI::is('admin/dashboard') ? 'active' : false )?>"><a href="<?php echo url('admin/dashboard')?>"><i class="icon-home"></i> Home</a></li>
	<li class="nav-header">Frames</li>
	<li class="<?php echo ( URI::segment(2) == 'frames_gallery' ? 'active' : false )?>"><a href="<?php echo url('admin/frames_gallery')?>"><i class="icon-camera"></i> Frames Category</a></li>
	<li class="<?php echo ( URI::segment(2) == 'frames' ? 'active' : false )?>"><a href="<?php echo url('admin/frames')?>"><i class="icon-camera"></i> Frames</a></li>
	<li class="nav-header">Galleries &amp; Images</li>
	<li class="<?php echo ( URI::segment(2) == 'gallery' ? 'active' : false )?>"><a href="<?php echo url('admin/gallery')?>"><i class="icon-camera"></i> Galleries</a></li>
	<li class="<?php echo ( URI::segment(2) == 'images' ? 'active' : false )?>"><a href="<?php echo url('admin/images')?>"><i class="icon-camera"></i> Images</a></li>
	<li class="<?php echo ( URI::segment(2) == 'textes' ? 'active' : false )?>"><a href="<?php echo url('admin/textes')?>"><i class="icon-font"></i> Textes</a></li>
	<li class="nav-header">News &amp; Articles</li>
	<li class="<?php echo ( URI::segment(2) == 'news' ? 'active' : false )?>"><a href="<?php echo url('admin/news')?>"><i class="icon-book"></i> News Articles</a></li>
	<li class="nav-header">Pages &amp; Sections</li>
	<li class="<?php echo ( URI::segment(2) == 'pages' ? 'active' : false )?>"><a href="<?php echo url('admin/pages')?>"><i class="icon-pencil"></i> Pages</a></li>
	<li class="<?php echo ( URI::segment(2) == 'sections' ? 'active' : false )?>"><a href="<?php echo url('admin/sections')?>"><i class="icon-pencil"></i> Sections</a></li>
	<li class="<?php echo ( URI::segment(2) == 'tips' ? 'active' : false )?>"><a href="<?php echo url('admin/tips')?>"><i class="icon-font"></i> Tips</a></li>
	<li class="nav-header">Users &amp; Roles</li>
	<li class="<?php echo ( URI::segment(2) == 'users' ? 'active' : false )?>"><a href="<?php echo url('admin/users')?>"><i class="icon-user"></i> Users</a></li>
	<li class="<?php echo ( URI::segment(2) == 'roles' ? 'active' : false )?>"><a href="<?php echo url('admin/roles')?>"><i class="icon-cog"></i> Roles</a></li>
	<li class="divider"></li>
	<li class="<?php echo ( URI::segment(2) == 'help' ? 'active' : false )?>"><a href="<?php echo url('admin/help')?>"><i class="icon-flag"></i> Help &amp; Support</a></li>
</ul>