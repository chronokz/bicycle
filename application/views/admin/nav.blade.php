<?php
AdminMenu::addItem('home', 'Dashboard', '');

AdminMenu::addItem('font', 'Pages', 'page');

AdminMenu::addItem('user', 'Users');
AdminMenu::addSubItem('Users', 'users');
AdminMenu::addSubItem('Roles', 'roles');

echo AdminMenu::compile(array(
		'class'=> 'mainNav',
		'data-open-subnavs' => 'multi'
	));
?>

<!--ul class="mainNav" data-open-subnavs="multi">
	<li>
		<a href="{{ url('admin') }}"><i class="icon-home icon-white"></i><span>Dashboard</span></a>
	</li>
	<li>
		<a href="{{ url('admin/page') }}"><i class="icon-font icon-white"></i><span>Pages</span></a>
	</li>
	<li>
		<a href=""><i class="icon-user icon-white"></i><span>Users</span></a>
		<ul class="subnav">
			<li>
				<a href="{{ url('admin/users') }}">Users</a>
			</li>
			<li>
				<a href="{{ url('admin/roles') }}">Roles</a>
			</li>
		</ul>
	</li>
</ul-->
<!-- All menu

<ul class="mainNav" data-open-subnavs="multi">
	<li>
		<a href="http://www.eakroko.de/ease/dashboard.html"><i class="icon-home icon-white"></i><span>Dashboard</span></a>
	</li>
	<li>
		<a href=""><i class="icon-edit icon-white"></i><span>Forms</span><span class="label">4</span></a>
		<ul class="subnav">
			<li>
				<a href="http://www.eakroko.de/ease/basic-forms.html">Basic forms</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/extended-forms.html">Extended form elements</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/form-validation.html">Form validation</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/form-wizard.html">Form wizard</a>
			</li>
		</ul>
	</li>
	<li>
		<a href=""><i class="icon-th-large icon-white"></i><span>Components</span><span class="label">6</span></a>
		<ul class="subnav">
			<li>
				<a href="http://www.eakroko.de/ease/messages.html">Messages &amp; Chat</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/gallery.html">Gallery &amp; thumbs</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/icons-buttons.html">Icons &amp; buttons</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/ui-elements.html">UI Elements</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/bootstrap-elements.html">Bootstrap elements</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/grid.html">Grid</a>
			</li>
		</ul>
	</li>
	<li>
		<a href="http://www.eakroko.de/ease/charts.html"><i class="icon-signal icon-white"></i><span>Charts</span></a>
	</li>
	<li class="active">
		<a href="./tables_files/tables.html"><i class="icon-th-list icon-white"></i><span>Tables</span></a>
	</li>
	<li>
		<a href="http://www.eakroko.de/ease/error-pages.html"><i class="icon-warning-sign icon-white"></i><span>Error Pages</span></a>
	</li>
	<li>
		<a href="http://www.eakroko.de/ease/calendar.html"><i class="icon-calendar icon-white"></i><span>Calendar</span></a>
	</li>
	<li>
		<a href="http://www.eakroko.de/ease/file-management.html"><i class="icon-hdd icon-white"></i><span>File management</span></a>
	</li>
	<li>
		<a href=""><i class="icon-th icon-white"></i><span>More pages</span><span class="label">4</span></a>
		<ul class="subnav">
			<li>
				<a href="http://www.eakroko.de/ease/invoice.html">Invoice</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/search-page.html">Search page</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/user-profile.html">User profile</a>
			</li>
			<li>
				<a href="http://www.eakroko.de/ease/blank-page.html">Blank page</a>
			</li>
		</ul>
	</li>
</ul>
-->