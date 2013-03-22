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
	<link rel="shortcut icon" href="{{ asset('img/admin/favicon.png') }}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('img/admin/favicon.png') }}">

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
				<a href="{{ URL::to('admin/logout') }}" class="button">
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
					<h4><i class="icon-table"></i> Tables</h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li><a href="http://www.eakroko.de/ease/dashboard.html">Home</a><span class="divider">/</span></li>
						<li class="active">Tables</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid" id="content-area">
				<div class="row-fluid">
					<div class="span12">
								{{ $content }}
						<div class="box">
							<div class="box-head">
								<i class="icon-table"></i>
								<span>Basic table</span>
							</div>
							<div class="box-body box-body-nopadding">
								<table class="table table-nomargin">
									<thead>
										<tr>
											<th>Rendering engine</th>
											<th>Browser</th>
											<th>Platform(s)</th>
											<th>Engine version</th>
											<th>CSS grade</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Trident</td>
											<td>Internet
												Explorer 4.0</td>
												<td>Win 95+</td>
												<td>4</td>
												<td>X</td>
											</tr>
											<tr>
												<td>Presto</td>
												<td>Nokia N800</td>
												<td>N800</td>
												<td>-</td>
												<td>A</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>NetFront 3.4</td>
												<td>Embedded devices</td>
												<td>-</td>
												<td>A</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>Dillo 0.8</td>
												<td>Embedded devices</td>
												<td>-</td>
												<td>X</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>Links</td>
												<td>Text only</td>
												<td>-</td>
												<td>X</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>Lynx</td>
												<td>Text only</td>
												<td>-</td>
												<td>X</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>IE Mobile</td>
												<td>Windows Mobile 6</td>
												<td>-</td>
												<td>C</td>
											</tr>
											<tr>
												<td>Misc</td>
												<td>PSP browser</td>
												<td>PSP</td>
												<td>-</td>
												<td>C</td>
											</tr>
											<tr>
												<td>Other browsers</td>
												<td>All others</td>
												<td>-</td>
												<td>-</td>
												<td>U</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-table"></i>
									<span>Bordered table</span>
								</div>
								<div class="box-body box-body-nopadding">
									<table class="table table-nomargin table-bordered">
										<thead>
											<tr>
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th>Engine version</th>
												<th>CSS grade</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Trident</td>
												<td>Internet
													Explorer 4.0</td>
													<td>Win 95+</td>
													<td>4</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Presto</td>
													<td>Nokia N800</td>
													<td>N800</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>NetFront 3.4</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>A</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Dillo 0.8</td>
													<td>Embedded devices</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Links</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>Lynx</td>
													<td>Text only</td>
													<td>-</td>
													<td>X</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>IE Mobile</td>
													<td>Windows Mobile 6</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Misc</td>
													<td>PSP browser</td>
													<td>PSP</td>
													<td>-</td>
													<td>C</td>
												</tr>
												<tr>
													<td>Other browsers</td>
													<td>All others</td>
													<td>-</td>
													<td>-</td>
													<td>U</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span12">
								<div class="box">
									<div class="box-head">
										<i class="icon-table"></i>
										<span>Table with controls</span>
									</div>
									<div class="box-body box-body-nopadding">
										<div class="highlight-toolbar">
											<div class="pull-left"><div class="btn-toolbar">
												<div class="btn-group"><a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Refresh results"><i class="icon-refresh"></i></a></div>
												<div class="btn-group">
													<div class="dropdown">
														<a href="" class="button button-basic button-icon" data-toggle="dropdown" rel="tooltip" title="" data-original-title="Mark elements"><i class="icon-check-empty"></i><span class="caret"></span></a>
														<ul class="dropdown-menu">
															<li><a href="" class="sel-all">All</a></li>
															<li><a href="" class="sel-unread">Unread</a></li>
														</ul>
													</div>
												</div>
												<div class="btn-group">
													<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Archive"><i class="icon-inbox"></i></a>
													<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Mark as spam"><i class="icon-exclamation-sign"></i></a>
													<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i></a>
												</div>
												<div class="btn-group">
													<div class="dropdown">
														<a href="" class="button button-basic button-icon" data-toggle="dropdown" rel="tooltip" title="" data-original-title="Move to folder"><i class="icon-folder-close"></i><span class="caret"></span></a>
														<ul class="dropdown-menu">
															<li><a href="">Some folder</a></li>
															<li><a href="">Another folder</a></li>
														</ul>
													</div>
												</div>
											</div></div>
											<div class="pull-right">
												<div class="btn-toolbar">
													<div class="btn-group">
														<span><strong>1-25</strong> of <strong>348</strong></span>
													</div>
													<div class="btn-group">
														<a href="" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
														<a href="" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
													</div>
													<div class="btn-group">
														<div class="dropdown">
															<a href="" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></a>
															<ul class="dropdown-menu pull-right">
																<li><a href="">Settings</a></li>
																<li><a href="">Account settings</a></li>
																<li><a href="">Email settings</a></li>
																<li><a href="">Themes</a></li>
																<li><a href="">Help &amp; FAQ</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<table class="table table-nomargin table-bordered">
											<thead>
												<tr>
													<th>Rendering engine</th>
													<th>Browser</th>
													<th>Platform(s)</th>
													<th>Engine version</th>
													<th>CSS grade</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Trident</td>
													<td>Internet
														Explorer 4.0</td>
														<td>Win 95+</td>
														<td>4</td>
														<td>X</td>
													</tr>
													<tr>
														<td>Presto</td>
														<td>Nokia N800</td>
														<td>N800</td>
														<td>-</td>
														<td>A</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>NetFront 3.4</td>
														<td>Embedded devices</td>
														<td>-</td>
														<td>A</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>Dillo 0.8</td>
														<td>Embedded devices</td>
														<td>-</td>
														<td>X</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>Links</td>
														<td>Text only</td>
														<td>-</td>
														<td>X</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>Lynx</td>
														<td>Text only</td>
														<td>-</td>
														<td>X</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>IE Mobile</td>
														<td>Windows Mobile 6</td>
														<td>-</td>
														<td>C</td>
													</tr>
													<tr>
														<td>Misc</td>
														<td>PSP browser</td>
														<td>PSP</td>
														<td>-</td>
														<td>C</td>
													</tr>
													<tr>
														<td>Other browsers</td>
														<td>All others</td>
														<td>-</td>
														<td>-</td>
														<td>U</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="box">
										<div class="box-head">
											<i class="icon-table"></i>
											<span>Table with controls &amp; pagination</span>
										</div>
										<div class="box-body box-body-nopadding">
											<div class="highlight-toolbar">
												<div class="pull-left"><div class="btn-toolbar">
													<div class="btn-group">
														<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Archive"><i class="icon-inbox"></i></a>
														<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Mark as spam"><i class="icon-exclamation-sign"></i></a>
														<a href="" class="button button-basic button-icon" rel="tooltip" title="" data-original-title="Delete"><i class="icon-trash"></i></a>
													</div>
												</div></div>
												<div class="pull-right">
													<div class="btn-toolbar">
														<div class="btn-group">
															<span><strong>1-25</strong> of <strong>348</strong></span>
														</div>
														<div class="btn-group">
															<a href="" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-left"></i></a>
															<a href="" class="button button-basic button-icon" data-toggle="dropdown"><i class="icon-angle-right"></i></a>
														</div>
													</div>
												</div>
											</div>
											<table class="table table-nomargin table-bordered table-pagination">
												<thead>
													<tr>
														<th>Rendering engine</th>
														<th>Browser</th>
														<th>Platform(s)</th>
														<th>Engine version</th>
														<th>CSS grade</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Trident</td>
														<td>Internet
															Explorer 4.0</td>
															<td>Win 95+</td>
															<td>4</td>
															<td>X</td>
														</tr>
														<tr>
															<td>Presto</td>
															<td>Nokia N800</td>
															<td>N800</td>
															<td>-</td>
															<td>A</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>NetFront 3.4</td>
															<td>Embedded devices</td>
															<td>-</td>
															<td>A</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>Dillo 0.8</td>
															<td>Embedded devices</td>
															<td>-</td>
															<td>X</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>Links</td>
															<td>Text only</td>
															<td>-</td>
															<td>X</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>Lynx</td>
															<td>Text only</td>
															<td>-</td>
															<td>X</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>IE Mobile</td>
															<td>Windows Mobile 6</td>
															<td>-</td>
															<td>C</td>
														</tr>
														<tr>
															<td>Misc</td>
															<td>PSP browser</td>
															<td>PSP</td>
															<td>-</td>
															<td>C</td>
														</tr>
														<tr>
															<td>Other browsers</td>
															<td>All others</td>
															<td>-</td>
															<td>-</td>
															<td>U</td>
														</tr>
													</tbody>
												</table>
												<div class="bottom-table">
													<div class="pull-left">
														<a href="" class="button button-basic">Another button</a>
													</div>
													<div class="pull-right"><div class="pagination pagination-custom">
														<ul>
															<li><a href=""><i class="icon-double-angle-left"></i></a></li>
															<li><a href="">1</a></li>
															<li class="active"><a href="">2</a></li>
															<li><a href="">3</a></li>
															<li><a href="">4</a></li>
															<li><a href="">5</a></li>
															<li><a href=""><i class="icon-double-angle-right"></i></a></li>
														</ul>
													</div></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12">
										<div class="box">
											<div class="box-head">
												<i class="icon-table"></i>
												<span>Striped table</span>
											</div>
											<div class="box-body box-body-nopadding">
												<table class="table table-nomargin table-striped table-bordered">
													<thead>
														<tr>
															<th>Rendering engine</th>
															<th>Browser</th>
															<th>Platform(s)</th>
															<th>Engine version</th>
															<th>CSS grade</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>Trident</td>
															<td>Internet
																Explorer 4.0</td>
																<td>Win 95+</td>
																<td>4</td>
																<td>X</td>
															</tr>
															<tr>
																<td>Presto</td>
																<td>Nokia N800</td>
																<td>N800</td>
																<td>-</td>
																<td>A</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>NetFront 3.4</td>
																<td>Embedded devices</td>
																<td>-</td>
																<td>A</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>Dillo 0.8</td>
																<td>Embedded devices</td>
																<td>-</td>
																<td>X</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>Links</td>
																<td>Text only</td>
																<td>-</td>
																<td>X</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>Lynx</td>
																<td>Text only</td>
																<td>-</td>
																<td>X</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>IE Mobile</td>
																<td>Windows Mobile 6</td>
																<td>-</td>
																<td>C</td>
															</tr>
															<tr>
																<td>Misc</td>
																<td>PSP browser</td>
																<td>PSP</td>
																<td>-</td>
																<td>C</td>
															</tr>
															<tr>
																<td>Other browsers</td>
																<td>All others</td>
																<td>-</td>
																<td>-</td>
																<td>U</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<div class="box">
												<div class="box-head">
													<i class="icon-table"></i>
													<span>Hoverable table</span>
												</div>
												<div class="box-body box-body-nopadding">
													<table class="table table-nomargin table-hover table-bordered">
														<thead>
															<tr>
																<th>Rendering engine</th>
																<th>Browser</th>
																<th>Platform(s)</th>
																<th>Engine version</th>
																<th>CSS grade</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Trident</td>
																<td>Internet
																	Explorer 4.0</td>
																	<td>Win 95+</td>
																	<td>4</td>
																	<td>X</td>
																</tr>
																<tr>
																	<td>Presto</td>
																	<td>Nokia N800</td>
																	<td>N800</td>
																	<td>-</td>
																	<td>A</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>NetFront 3.4</td>
																	<td>Embedded devices</td>
																	<td>-</td>
																	<td>A</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>Dillo 0.8</td>
																	<td>Embedded devices</td>
																	<td>-</td>
																	<td>X</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>Links</td>
																	<td>Text only</td>
																	<td>-</td>
																	<td>X</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>Lynx</td>
																	<td>Text only</td>
																	<td>-</td>
																	<td>X</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>IE Mobile</td>
																	<td>Windows Mobile 6</td>
																	<td>-</td>
																	<td>C</td>
																</tr>
																<tr>
																	<td>Misc</td>
																	<td>PSP browser</td>
																	<td>PSP</td>
																	<td>-</td>
																	<td>C</td>
																</tr>
																<tr>
																	<td>Other browsers</td>
																	<td>All others</td>
																	<td>-</td>
																	<td>-</td>
																	<td>U</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span12">
												<div class="box">
													<div class="box-head">
														<i class="icon-table"></i>
														<span>Dynamic tables</span>
													</div>
													<div class="box-body box-body-nopadding">
														<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><div id="DataTables_Table_0_length" class="dataTables_length"><label><span>Show entries:</span> <select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><div class="dataTables_filter" id="DataTables_Table_0_filter"><label><span>Search:</span>  <input type="text" aria-controls="DataTables_Table_0" placeholder="Search here..."></label></div><table class="table table-nomargin table-bordered dataTable table-striped table-hover" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
															<thead>
																<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 201px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 220px;" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 215px;" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 172px;" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 129px;" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
															</thead>
															
															<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">NetFront 3.4</td>
																		<td class=" ">Embedded devices</td>
																		<td class=" ">-</td>
																		<td class=" ">A</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Dillo 0.8</td>
																		<td class=" ">Embedded devices</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Links</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Lynx</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">IE Mobile</td>
																		<td class=" ">Windows Mobile 6</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">PSP browser</td>
																		<td class=" ">PSP</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Lynx</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">IE Mobile</td>
																		<td class=" ">Windows Mobile 6</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">PSP browser</td>
																		<td class=" ">PSP</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Lynx</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr></tbody></table><div class="dataTables_info" id="DataTables_Table_0_info">Showing <span>1</span> to <span>10</span> of <span>17</span> entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_0_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_0_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_0_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_0_last">Last</a></div></div>
														</div>
													</div>
												</div>
											</div>
											<div class="row-fluid">
												<div class="span12">
													<div class="box">
														<div class="box-head">
															<i class="icon-table"></i>
															<span>Sortable table</span>
														</div>
														<div class="box-body box-body-nopadding">
															<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid"><table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-noheader dataTable-nofooter" id="DataTables_Table_1">
																<thead>
																	<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 219px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 165px;" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 223px;" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 188px;" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 142px;" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
																</thead>
																
															<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">PSP browser</td>
																		<td class=" ">PSP</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Lynx</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">IE Mobile</td>
																		<td class=" ">Windows Mobile 6</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">PSP browser</td>
																		<td class=" ">PSP</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">Lynx</td>
																		<td class=" ">Text only</td>
																		<td class=" ">-</td>
																		<td class=" ">X</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">IE Mobile</td>
																		<td class=" ">Windows Mobile 6</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Misc</td>
																		<td class=" ">PSP browser</td>
																		<td class=" ">PSP</td>
																		<td class=" ">-</td>
																		<td class=" ">C</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Other browsers</td>
																		<td class=" ">All others</td>
																		<td class=" ">-</td>
																		<td class=" ">-</td>
																		<td class=" ">U</td>
																	</tr><tr class="odd">
																		<td class="  sorting_1">Other browsers</td>
																		<td class=" ">All others</td>
																		<td class=" ">-</td>
																		<td class=" ">-</td>
																		<td class=" ">U</td>
																	</tr><tr class="even">
																		<td class="  sorting_1">Other browsers</td>
																		<td class=" ">All others</td>
																		<td class=" ">-</td>
																		<td class=" ">-</td>
																		<td class=" ">U</td>
																	</tr></tbody></table></div>
														</div>
													</div>
												</div>
											</div>
											<div class="row-fluid">
												<div class="span12">
													<div class="box">
														<div class="box-head">
															<i class="icon-table"></i>
															<span>TableTools</span>
														</div>
														<div class="box-body box-body-nopadding">
															<div id="DataTables_Table_2_wrapper" class="dataTables_wrapper" role="grid">
																<div class="DTTT_container">
																	<a class="DTTT_button DTTT_button_copy" id="ToolTables_DataTables_Table_2_0">
																		<span>Copy</span>
																		<div style="position: absolute; left: 0px; top: 0px; width: 43px; height: 32px; z-index: 99;">
																			<embed id="ZeroClipboard_TableToolsMovie_1" src="{{ URL::to('js/admin/copy_csv_xls_pdf.swf') }}" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="43" height="32" name="ZeroClipboard_TableToolsMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=43&amp;height=32" wmode="transparent">
																		</div>
																	</a>
																	<a class="DTTT_button DTTT_button_csv" id="ToolTables_DataTables_Table_2_1">
																		<span>CSV</span>
																		<div style="position: absolute; left: 0px; top: 0px; width: 40px; height: 32px; z-index: 99;">
																			<embed id="ZeroClipboard_TableToolsMovie_2" src="{{ URL::to('js/admin/copy_csv_xls_pdf.swf') }}" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="40" height="32" name="ZeroClipboard_TableToolsMovie_2" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=2&amp;width=40&amp;height=32" wmode="transparent"></div></a><a class="DTTT_button DTTT_button_xls" id="ToolTables_DataTables_Table_2_2"><span>Excel</span><div style="position: absolute; left: 0px; top: 0px; width: 44px; height: 32px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_3" src="{{ URL::to('js/admin/copy_csv_xls_pdf.swf') }}" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="44" height="32" name="ZeroClipboard_TableToolsMovie_3" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=3&amp;width=44&amp;height=32" wmode="transparent"></div></a><a class="DTTT_button DTTT_button_pdf" id="ToolTables_DataTables_Table_2_3"><span>PDF</span><div style="position: absolute; left: 0px; top: 0px; width: 37px; height: 32px; z-index: 99;"><embed id="ZeroClipboard_TableToolsMovie_4" src="{{ URL::to('js/admin/copy_csv_xls_pdf.swf') }}" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="37" height="32" name="ZeroClipboard_TableToolsMovie_4" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=4&amp;width=37&amp;height=32" wmode="transparent"></div></a><a class="DTTT_button DTTT_button_print" id="ToolTables_DataTables_Table_2_4" title="View print view"><span>Print</span></a></div><div class="clear"></div><div id="DataTables_Table_2_length" class="dataTables_length"><label><span>Show entries:</span> <select size="1" name="DataTables_Table_2_length" aria-controls="DataTables_Table_2"><option value="10" selected="selected">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div><div class="dataTables_filter" id="DataTables_Table_2_filter"><label><span>Search:</span>  <input type="text" aria-controls="DataTables_Table_2" placeholder="Search here..."></label></div><table class="table table-nomargin table-bordered dataTable table-striped table-hover dataTable-tools" id="DataTables_Table_2" aria-describedby="DataTables_Table_2_info">
																<thead>
																	<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 201px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Rendering engine</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 220px;" aria-label="Browser: activate to sort column ascending">Browser</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 215px;" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 172px;" aria-label="Engine version: activate to sort column ascending">Engine version</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 129px;" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
																</thead>
																
																<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">NetFront 3.4</td>
																			<td class=" ">Embedded devices</td>
																			<td class=" ">-</td>
																			<td class=" ">A</td>
																		</tr><tr class="even">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">Dillo 0.8</td>
																			<td class=" ">Embedded devices</td>
																			<td class=" ">-</td>
																			<td class=" ">X</td>
																		</tr><tr class="odd">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">Links</td>
																			<td class=" ">Text only</td>
																			<td class=" ">-</td>
																			<td class=" ">X</td>
																		</tr><tr class="even">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">Lynx</td>
																			<td class=" ">Text only</td>
																			<td class=" ">-</td>
																			<td class=" ">X</td>
																		</tr><tr class="odd">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">IE Mobile</td>
																			<td class=" ">Windows Mobile 6</td>
																			<td class=" ">-</td>
																			<td class=" ">C</td>
																		</tr><tr class="even">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">PSP browser</td>
																			<td class=" ">PSP</td>
																			<td class=" ">-</td>
																			<td class=" ">C</td>
																		</tr><tr class="odd">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">Lynx</td>
																			<td class=" ">Text only</td>
																			<td class=" ">-</td>
																			<td class=" ">X</td>
																		</tr><tr class="even">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">IE Mobile</td>
																			<td class=" ">Windows Mobile 6</td>
																			<td class=" ">-</td>
																			<td class=" ">C</td>
																		</tr><tr class="odd">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">PSP browser</td>
																			<td class=" ">PSP</td>
																			<td class=" ">-</td>
																			<td class=" ">C</td>
																		</tr><tr class="even">
																			<td class="  sorting_1">Misc</td>
																			<td class=" ">Lynx</td>
																			<td class=" ">Text only</td>
																			<td class=" ">-</td>
																			<td class=" ">X</td>
																		</tr></tbody></table><div class="dataTables_info" id="DataTables_Table_2_info">Showing <span>1</span> to <span>10</span> of <span>17</span> entries</div><div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_2_paginate"><a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_2_first">First</a><a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_2_previous">Previous</a><span><a tabindex="0" class="paginate_active">1</a><a tabindex="0" class="paginate_button">2</a></span><a tabindex="0" class="next paginate_button" id="DataTables_Table_2_next">Next</a><a tabindex="0" class="last paginate_button" id="DataTables_Table_2_last">Last</a></div></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="navi-functions">
										<div class="btn-group btn-group-custom">
											<a href="" class="button button-square layout-not-fixed notify button-active" rel="tooltip" title="" data-notify-message="Fixed nav is now State" data-notify-title="Toggled fixed nav" data-original-title="Toggle fixed-nav">
												<i class="icon-lock"></i>
											</a>
											<a href="" class="button button-square layout-not-fluid notify button-active" rel="tooltip" title="" data-notify-message="Fixed layout is now State" data-notify-title="Toggled fixed layout" data-original-title="Toggle fixed-layout">
												<i class="icon-exchange"></i>
											</a>
											<a href="" class="button button-square notify notify-inverse layout-no-nav" rel="tooltip" title="" data-notify-message="Navigation is now State" data-notify-title="Toggled navigation" data-original-title="Toggle navigation">
												<i class="icon-arrow-left"></i>
											</a>
											<a href="" class="button button-square button-active force-last notify-toggle toggle-active notify" rel="tooltip" title="" data-notify-message="Notifications turned State" data-notify-title="Toggled notifications" data-original-title="Toggle notification">
												<i class="icon-bullhorn"></i>
											</a>
										</div>
									</div>							

								<div id="ascrail2000" style="width: 5px; z-index: 9002; position: fixed; top: 40px; left: 193px; height: 863px; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(85, 85, 85); border: 0px; background-clip: padding-box; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"></div></div><div id="ascrail2000-hr" style="height: 6px; z-index: 9002; top: 897px; left: 0px; position: fixed; display: none;"><div style="position: relative; top: 0px; height: 5px; width: 0px; background-color: rgb(85, 85, 85); border: 0px; background-clip: padding-box; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"></div></div>
							</body></html>