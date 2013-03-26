<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>  <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="ie8 lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html lang="ru">
<head>
	<title>Admin</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta names="apple-mobile-web-app-status-bar-style" content="black" />
	

	<!-- Bootstrap -->
	<!--link rel="stylesheet" href="css/bootstrap.min.css"-->
	{{ HTML::style('css/admin/bootstrap.min.css') }}
	<!-- Bootstrap responsive -->
	<!--link rel="stylesheet" href="css/bootstrap-responsive.min.css"-->
	{{ HTML::style('css/admin/bootstrap-responsive.min.css') }}
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<!--link rel="stylesheet" href="css/style.css"-->
	{{ HTML::style('css/admin/style.css') }}
	<!-- <![endif]-->
	<!--link rel="stylesheet" href="css/style_ie.css"-->
	<!--[if IE]>
	{{ HTML::style('css/admin/style_ie.css') }}
	<![endif]-->

	<!-- jQuery -->
	<!--script src="js/jquery.min.js"></script-->
	{{ HTML::script('js/admin/jquery.min.js') }}
	<!-- Bootstrap -->
	<!--script src="js/bootstrap.min.js"></script-->
	{{ HTML::script('js/admin/bootstrap.min.js') }}

	<!-- Just for demonstration -->
	<!--script src="js/demonstration.min.js"></script-->
	{{ HTML::script('js/admin/demonstration.min.js') }}
	<!-- Theme scripts -->
	<!--script src="js/application.min.js"></script-->
	{{ HTML::script('js/admin/application.min.js') }}
	
	<link rel="shortcut icon" href="{{ asset('img/admin/favicon.jpg') }}">
	<link rel="apple-touch-icon-precomposed" href="{{ asset('img/admin/favicon.jpg') }}">

</head>
<body class='login-body'>
	<div class="login-wrap">
		<h2>Bicycle CMS</h2>
		<div class="login">
			{{ Form::open('admin/login', 'POST') }}
			{{ Form::token() }}
				<div class="sep"></div>
				<div class="un">
					<input type="text" name="username" placeholder="Username" class='input-block-level'>
				</div>
				<div class="pw">
					<input type="password" name="password" placeholder="Password" class='input-block-level'>
				</div>
				<button type="submit" value="Sign In" class='button button-basic-darkblue btn-block'>Sign In</button>
			{{ Form::close() }}
		</div>
	</div>
</body>

</html>