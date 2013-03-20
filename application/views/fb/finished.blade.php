{{ render('fb._splash') }}

<div class="width960">
	@if($method == 'link')
	<div class="field-row">
		<label>Ссылка на вашу открытку:
			<input type="text" value="{{ $link }}" readonly="readonly" style="width:100%">
		</label>
	</div>
	@endif
	@if($method == 'social')
	<div class="social-share">
		<label>Поделитесь своей открытой с друзьями из социальных сетей:</label>
		<a target="_blank" href="http://www.facebook.com/sharer.php?t={{ $title }}&amp;u={{ $link }}" class="btn btn-default">
			<img src="{{ asset('img/social/share_fb.png') }}" alt="Facebook"> Facebook
		</a>
		<a target="_blank" href="http://vkontakte.ru/share.php?url={{ $link }}"  class="btn btn-default">
			<img src="{{ asset('img/social/share_vk.png') }}" alt="ВКонтакте"> Вконтакте
		</a>
		<a target="_blank" href="http://twitter.com/share?url={{ $link }}&amp;text={{ $title }}&amp;hashtags=photocard_kz"  class="btn btn-default">
			<img src="{{ asset('img/social/share_tw.png') }}" alt="Twitter"> Twitter
		</a>
	</div>
	@endif
	@if($method == 'email')
	<div class="emails-recipients">
		<label>Открытка была отправлена следующим адресатам:</label>
		@foreach($recipients as $recipient)
			{{ HTML::span($recipient, array('class'=>'btn')) }}
		@endforeach
	</div>
	@endif
	<img src="{{ $link }}" alt="{{ $title }}" class="result">
</div>
<br>