<div class="splash">
	<div class="decor-top"></div>
	<div class="width960">
		<div class="panel">
			<strong>ШАГ 2 ИЗ 2:</strong>
			{{ HTML::link('postcard', 'Шаг назад', array('class'=>'btn btn-primary pull-right')) }}
			<h1>Поздравительный текст</h1>
			<div class="text">
				Украсьте открытку праздничными поздравлениями.
			</div>
		</div>
	</div>
	<div class="decor-bottom"></div>
</div>

<div class="width960" id="create_card">
	{{ Form::open('postcard/create','post') }}
	<div class="frame">
		<div class="card">
			{{ HTML::image(Image::$upload.$image->cards_filename) }}
		</div>
		<div class="fields">
			<div class="field">
				<label>
					Заголовок:
					<input type="text" name="title" maxlength="32" placeholder="Введите заголовок" title="Кликните здесь чтобы изменить заголовок" class="active">
				</label>
			</div>

			<div class="field">
				<label>
					Текст поздравления:
					<textarea name="text" maxlength="280" placeholder="Введите текст поздравления" title="Кликните здесь чтобы изменить текст поздравления" class="active"></textarea>
					<pre class="pseudo_text"></pre>
				</label>
				<a class="select_text">Выбрать готовый текст поздравления</a>
			</div>

			<div class="field">
				<label>
					Кому:
					<input type="text" maxlength="28" name="to" placeholder="Введите имя получателя"  title="Кликните здесь чтобы изменить кому" class="active">
				</label>
			</div>

			<div class="field">
				<label>
					От кого:
					<input type="text" maxlength="28" name="from" placeholder="Введите ваше имя" title="Кликните здесь чтобы изменить от кого" class="active">
				</label>
			</div>

		</div>

	</div>
	<div class="frames">
		<nav class="nav nav-pills nav-frame-cateroies">
		@foreach($frames as $category_frame)
			<li {{ ($category_frame->default)?'class="active"':'' }}><a rel="{{ $category_frame->id }}"><span>{{ $category_frame->title }}</span></a></li>
		@endforeach
		</nav>
		@foreach($frames as $category_frame)
		<div class="frame_collection" rel="{{ $category_frame->id }}" {{ ($category_frame->default)?'':'style="display:none"' }}>
			<a class="prev_move"></a>
			<a class="next_move"></a>
			<div class="scrollable">
				<ul class="gallery_frames items" rel="{{ $category_frame->id }}">
					@foreach($category_frame->frame as $frame)
					<li>
						<a rel="{{ $frame->id }}" data-frame="/{{ Frame::$upload, $frame->upload->filename }}">
							<img src="/{{ Frame::$upload.$frame->upload->small_filename }}" alt="">
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endforeach
	</div>
	
	<div class="clearfix"></div><br>
	{{ Form::hidden('frame') }}
	{{ Form::hidden('method') }}
	{{ Form::hidden('image', $image->link_id) }}

<div class="center-btns">
	<div class="btn-group">
		<a class="btn btn-primary dropdown-toggle btn-large" data-toggle="dropdown" href="#">
			Отправить <span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li><a class="send_by_link">Создать ссылку</a></li>
			<li><a class="send_by_social">Поделиться в соц. сети</a></li>
			<li><a class="send_by_email">Отправить на e-mail</a></li>
		</ul>
	</div>
</div>

<div id="send_by_email" class="hide">
	<label for="list_of_emails">Укажите e-mail'ы адресатов, указав их через запятую</label>
	<div class="input-append">
		<input class="span4" id="list_of_emails" name="emails" type="text">
		{{ Form::submit('Отправить', array('class'=>'btn btn-default')) }}
		<!--button class="btn btn-default" type="button">Отправить</button-->
	</div>
</div>

<div id="creating_card">Подождите... идёт создание открытки</div>

	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

<!-- Modal -->
<div id="textModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="textModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Выберите подходящий текст</h3>
	</div>
	<div class="modal-body">
		<ul class="text-list">
			@foreach($texts as $text)
				<li rel="{{ $text->lang }}">{{ HTML::link('#',Str::limit($text->text, 100), array('rel' => $text->text )) }}</li>
			@endforeach
		</ul>
	</div>
	<div class="modal-footer">
		<div class="btn-group lang-select" data-toggle="buttons-radio">
			<button type="button" rel="ru" class="btn">На русском</button>
			<button type="button" rel="kz" class="btn">На казахском</button>
		</div>
		<button class="btn btn-default btn-inverse" data-dismiss="modal" aria-hidden="true">Отмена</button>
	</div>
</div>

{{ HTML::script('js/jquery.scrollable.js') }}
<script type="text/javascript">
	$('.select_text').click(function(){
		if($(this).closest('.field').find('textarea').val())
		{
			if(confirm('Текущий текст будет заменен. Продолжить?'))
				$('#textModal').modal('show');
		}
		else
		{
			$('#textModal').modal('show');	
		}
	});

	function validate_global_allow(key){
		if(key==8 || key==9 || (key>=35 && key<=40) || key==46)
		{
			return true;
		}
	};
/*
	$('textarea[name=text]').keydown(function(e){
		var key = e.keyCode?e.keyCode:e.which;
		$('.pseudo_text').text($(this).val());
		if($(this).val().length>=$(this).attr('maxlength'))
		{
			if(!validate_global_allow(key))
			{
				alert('Превышен лимит текста в '+$(this).attr('maxlength'));
				e.preventDefault();
			}
		}
	});

	$('textarea[name=text]').keydown(function(e){
		var key = e.keyCode?e.keyCode:e.which;
		if($('.pseudo_text').height()>=200)
		{
			if(!validate_global_allow(key))
			{
				alert('Превышен лимит текста по высоте');
				e.preventDefault();
				
			}
		}
	});
*/

	$('.scrollable').scrollable();

	$('.next_move').click(function(){
		$(this).closest('div').children('.scrollable').data('scrollable').next();
	});

	$('.prev_move').click(function(){
		$(this).closest('div').children('.scrollable').data('scrollable').prev();
	});

	var form = '#create_card form';
	$('.send_by_link').click(function(){
		$(form + ' [name=method]').val('link');
		$(form).submit();
	});
	$('.send_by_email').click(function(){
		$(form + ' [name=method]').val('email');
		$('#send_by_email').fadeIn();
	});
	$('.send_by_social').click(function(){
		$(form + ' [name=method]').val('social');
		$(form).submit();
	});
	/*
	$(form + ' [name=text]').keydown(function(){
		alert($(this).val().split("\n").length);
	});
	*/

	$(form).submit(function(){
		if(!$(form + ' [name=method]').val())
			{ alert('Выберите способ отправки'); return false; }
		
		if(!$(form + ' [name=frame]').val())
			{ alert('Выберите рамку'); return false; }

		if(!$(form + ' [name=title]').val())
			{ alert('Введите заголовок'); return false; }

		if(!$(form + ' [name=text]').val())
			{ alert('Введите поздравительный текст'); return false; }

		if(!$(form + ' [name=to]').val())
			{ alert('Заполните поле кому'); return false; }

		if(!$(form + ' [name=from]').val())
			{ alert('Заполните поле от кого'); return false; }

		$('#creating_card').fadeIn();
	});
	$('.text-list li a').click(function(){
		$(form + ' [name=text]').val($(this).attr('rel'));
		$('#textModal').modal('hide')
	});
	$('.lang-select button').click(function(){
		$('.text-list li').hide();
		$('.text-list li[rel='+$(this).attr('rel')+']').fadeIn();
	});
	$('.lang-select button:first').click();
</script>