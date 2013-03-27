<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>  <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="ie8 lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html lang="ru">
<head>
	<title>Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent">
	
	<!-- Bootstrap -->
	<!--link rel="stylesheet" href="http://www.eakroko.de/ease/css/bootstrap.min.css"-->
	{{ HTML::style('css/admin/bootstrap.min.css') }}
	<!-- Bootstrap responsive -->
	<!--link rel="stylesheet" href="http://www.eakroko.de/ease/css/bootstrap-responsive.min.css"-->
	{{ HTML::style('css/admin/bootstrap-responsive.min.css') }}
	<!-- CSS for Growl like notifications -->
	<!--link rel="stylesheet" href="http://www.eakroko.de/ease/css/jquery.gritter.css"-->
	{{ HTML::style('css/admin/jquery.gritter.css') }}
	<!-- TableTools for dataTables plugin -->
	<!--link rel="stylesheet" href="http://www.eakroko.de/ease/css/TableTools.css"-->
	{{ HTML::style('css/admin/TableTools.css') }}
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<!--link rel="stylesheet" href="http://www.eakroko.de/ease/css/style.css"-->
	{{ HTML::style('css/admin/style.css') }}
	<!-- <![endif]-->
	<!--link rel="stylesheet" href="css/style_ie.css"-->
	<!--[if IE]>
	{{ HTML::style('css/admin/style_ie.css') }}
	<![endif]-->

	<!-- jQuery -->
	<!--script type="text/javascript" async="" src="./tables_files/ga.js"></script-->
	<!--script src="./tables_files/jquery.min.js"></script-->
	{{ HTML::script('js/admin/jquery.min.js') }}
	<!-- smoother animations -->
	<!--script src="./tables_files/jquery.easing.min.js"></script-->
	{{ HTML::script('js/admin/jquery.easing.min.js') }}
	<!-- Bootstrap -->
	<!--script src="./tables_files/bootstrap.min.js"></script-->
	{{ HTML::script('js/admin/bootstrap.min.js') }}
	<!-- Scrollable navigation -->
	<!--script src="./tables_files/jquery.nicescroll.min.js"></script-->
	{{ HTML::script('js/admin/jquery.nicescroll.min.js') }}
	<!-- Growl Like notifications -->
	<!--script src="./tables_files/jquery.gritter.min.js"></script-->
	{{ HTML::script('js/admin/jquery.gritter.min.js') }}
	<!-- dataTables plugin -->
	<!--script src="./tables_files/jquery.dataTables.min.js"></script-->
	{{ HTML::script('js/admin/jquery.dataTables.min.js') }}
	<!-- TableTools for dataTables plguin -->
	<!--script src="./tables_files/TableTools.min.js"></script-->
	{{ HTML::script('js/admin/TableTools.min.js') }}

	<!-- Just for demonstration -->
	<!--script src="./tables_files/demonstration.min.js"></script-->
	{{ HTML::script('js/admin/demonstration.min.js') }}
	<!-- Theme framework -->
	<!--script src="./tables_files/eakroko.min.js"></script-->
	{{ HTML::script('js/admin/eakroko.min.js') }}
	<!-- Theme scripts -->
	<!--script src="./tables_files/application.min.js"></script-->
	{{ HTML::script('js/admin/application.min.js') }}
	<link rel="shortcut icon" href="{{ asset('img/admin/favicon.jpg') }}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('img/admin/favicon.jpg') }}">

</head>
<?php
	$auth = Auth::user();
?>
<body data-layout="fixed">
	<div id="top" style="position: fixed;" class="navbar-fixed-top"> 
		<div class="container-fluid">
			<div class="pull-left">
				<a href="" id="brand"><span></span>Bicycle CMS</a>
				<!--
				<div class="collapse-me" style="">
					<a href="http://www.eakroko.de/ease/messages.html" class="button">
						<i class="icon-comment icon-white"></i>
						Messages
						<span class="badge badge-important">21</span>
					</a>
					<a href="" class="button">
						<i class="icon-question-sign icon-white"></i>
						Support tickets
						<span class="badge badge-info">3</span>
					</a>
					<a href="" class="button">
						<i class="icon-truck icon-white"></i>
						Orders
						<span class="badge badge-default">5</span>
					</a>
				</div>
				-->
			</div>
			<div class="pull-right">
				<div class="btn-group">
					<a href="" class="button dropdown-toggle" data-toggle="dropdown">
						<i class="icon-white icon-user"></i>
						{{ $auth->username }}
						<span class="caret"></span>
					</a>
					<div class="dropdown-menu pull-right">
						<div class="right-details">
							<h6>Logged in as</h6>
							<span class="name">{{ $auth->first_name }} {{ $auth->last_name }}</span>
							<span class="email">{{ $auth->email }} </span>
							<a href="" class="highlighted-link">Need help?</a>
							<ul>
								<li>
									<a href="">Getting started</a>
								</li>
								<li>
									<a href="">Account settings</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<a href="{{ url('admin/logout') }}" class="button">
					<i class="icon-signout"></i>
					Logout
				</a>
			</div>
		</div>
	</div>
	
	<div id="main">
		<div id="navigation" style="position: fixed; top: 40px; left: 0px; height: 863px; overflow: hidden; outline: none;" tabindex="5000">
			<div class="search">
				<i class="icon-search icon-white"></i>
				<form action="http://www.eakroko.de/ease/search-page.html" method="get">
					<input type="text" placeholder="Search here">
				</form>
				<div class="dropdown">
					<a href="" class="search-settings dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i></a>
					<ul class="dropdown-menu">
						<li class="sort-by">
							Sort by <span class="filter">Categories</span> <span class="order">A-Z</span>
						</li>
						<li class="heading">
							Filter categories
						</li>
						<li class="filter active">
							Categories
						</li>
						<li class="filter">
							Countries
						</li>
						<li class="filter">
							Likes
						</li>
						<li class="heading">
							Sorting order
						</li>
						<li class="order active">
							Ascending
						</li>
						<li class="order">
							Descending
						</li>
					</ul>
				</div>
			</div>

			{{ render('admin.nav') }}
			<!--
			<div class="status button">
				<div class="status-top">
					<div class="left">
						Saving changes...
					</div>
				</div>
				<div class="status-bottom">
					<div class="progress">
						<div class="bar" style="width: 34%;">34%</div>
					</div>
				</div>
			</div>
			-->
		</div>
		<div id="content" style="padding-top: 40px;">
			<div class="page-header">
				<div class="pull-left">
					<h4><i class="icon-{{ $icon }}"></i> {{ $title }} </h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li>{{ HTML::link('admin', __('Home')) }}<span class="divider">/</span></li>
						<li class="active">{{ $title }}</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid" id="content-area">
				<div class="row-fluid">
					<div class="span12">
								{{ $content }}
					</div>
				</div>
			</div>
							
		</div>
	</div>
	<div id="ascrail2000" style="width: 5px; z-index: 9002; position: fixed; top: 40px; left: 193px; height: 863px; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(85, 85, 85); border: 0px; background-clip: padding-box; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"></div></div><div id="ascrail2000-hr" style="height: 6px; z-index: 9002; top: 897px; left: 0px; position: fixed; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(85, 85, 85); border: 0px; background-clip: padding-box; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"></div></div>
</body></html>