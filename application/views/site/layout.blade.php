<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>  <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="ie8 lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>{{ $title }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/bootstrap-responsive.min.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/jquery.selectBox.css') }}

	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/jquery.maskedinput-1.2.2.js') }}
	{{ HTML::script('js/jquery.selectBox.min.js') }}
	{{ HTML::script('js/jquery.selectBox.min.js') }}
	{{ HTML::script('js/init.js') }}

</head>
<body>
	<div id="body">
	<nav id="main_menu" role="menu">
		<li>{{ HTML::link('quastion', 'Спросить эксперта') }}</li>
		<li>{{ HTML::link('manager', 'Вызвать менеджера') }}</li>
		<li>{{ HTML::link('', 'Обсуждения') }}</li>
		<li>{{ HTML::link('', 'Опрос недели') }}</li>
		<li>{{ HTML::link('', 'Акции и конкурсы') }}</li>
		<li>{{ HTML::link('', 'Прошедшие акции') }}</li>
		<li>{{ HTML::link('', 'Услуги компании') }}</li>
		<li>{{ HTML::link('', 'Калькулятор') }}</li>
	</nav>

		{{ $content }}

	</div>
</body>
</html>