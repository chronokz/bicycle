<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>  <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>  <html class="ie8 lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Photocard.kz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/bootstrap-responsive.min.css') }}
	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::style('css/fb.css') }}
	{{ Config::get('application.branding')?HTML::style('css/brand.'.Config::get('application.branding').'.css'):'' }}

	{{ HTML::script('js/jquery-1.9.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/quickpager.jquery.js') }}
	{{ HTML::script('js/jquery.fb-events.js') }}


	<!--[if lt IE 9]>
	{{ HTML::script('js/html5shiv.js') }}
	<![endif]-->
</head>
<body>
	<div class="delta"></div>
	<div class="width960">
		<header class="header row-fluid">
			<div class="span3">
				<a href="{{ URL::to('fb/cards') }}"><img src="{{ asset('img/logo.png') }}" alt="PhotoCard.kz"></a>
			</div>
		</header>
	</div>

	{{ $content }}

	<footer>
		<div class="footer_line"></div>
		<div class="width960">
			<div class="row">
				<div class="span7">
					<h4>Проект Samsung Electronics</h4>
					<p>
						<a target="_blank" href="http://www.samsung.com/kz_ru/index.html#latest-home">Корпоративный сайт Samsung</a>
					</p>
					<p>
						<a target="_blank" href="http://www.samsung-nx.kz/">Сайт фотокамер Samsung NX</a>
					</p>
				</div>
			</div>

			<a href="http://ibecsystems.com" target="_blank" class="ibec"></a>
		</div
	</footer>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-39389123-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter20624074 = new Ya.Metrika({id:20624074, clickmap:true, trackLinks:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/20624074" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>