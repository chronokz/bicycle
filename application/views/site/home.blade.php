	<!--div class="splash_main">
		<div class="decor-top"></div>
		<div class="width960">
			<div class="panel">
				<strong>Поздравляйте красиво:</strong>
				<h1>ИНТЕРАКТИВНЫЕ ОТКРЫТКИ</h1>
				{{ HTML::link('postcard', 'Приступить к созданию открытки', array('class'=>'btn btn-primary btn-large')) }}
				<div class="text">
					Создавайте стильные интерактивные открытки из фотографий. Отправляйте их друзьям и родным, чтобы поделиться радостной минутой.
				</div>
			</div>
		</div>
		<div class="decor-bottom"></div>
	</div-->

	<div class="splash_main">
		<div class="decor-top"></div>
		<div class="width960">
			<div class="panel">
				<h1>С ПРАЗДНИКОМ НАУРЫЗ!</h1>
				{{ HTML::link('postcard', 'Приступить к созданию открытки', array('class'=>'btn btn-primary btn-large')) }}
				<div class="text">
					Дорогие друзья, мы поздравляем вас с замечательным праздником весны! Желаем счастья и любви. Ваш PhotoCard.kz
				</div>
			</div>
		</div>
		<div class="decor-bottom"></div>
	</div>



	<div class="width960 parallax">
		<div class="parallax-layer layer3">
			<p>
				<img src="{{ asset('img/slides/slide3_1.png') }}">
				<img src="{{ asset('img/slides/slide3_2.png') }}">
			</p>
		</div>
		<div class="parallax-layer layer2">
			<p>
				<img src="{{ asset('img/slides/slide2_1.png') }}">
				<img src="{{ asset('img/slides/slide2_2.png') }}">
				<img src="{{ asset('img/slides/slide2_3.png') }}">
			</p>
		</div>

		<div class="parallax-layer layer1">
			<p>
				<img src="{{ asset('img/slides/slide1_1.png') }}">
				<img src="{{ asset('img/slides/slide1_2.png') }}">
				<img src="{{ asset('img/slides/slide1_3.png') }}">
				<img src="{{ asset('img/slides/slide1_4.png') }}">
				<img src="{{ asset('img/slides/slide1_5.png') }}">
			</p>
		</div>
	</div>
	<div class="width960">
		<h2><b>Как это делается?</b> Просто!</h2>
		<div class="row-fluid steps">
			<div class="span4 well step1">
				<span class="next_step"></span>
				<h3>Шаг 1.</h3>
				<div class="pic"></div>
				Выберите любую понравившуюся фотографию из {{ HTML::link('postcard', 'галереи PhotoCard') }}.
			</div>
			<div class="span4 well step2">
				<span class="next_step"></span>
				<h3>Шаг 2.</h3>
				<div class="pic"></div>
				Превратите выбранное вами фото в открытку.
			</div>
			<div class="span4 well step3">
				<h3>Шаг 3.</h3>
				<div class="pic"></div>
				Отправьте вашу уникальную открытку друзьям и близким по почте или в соцсети.
			</div>
		</div>
	</div>