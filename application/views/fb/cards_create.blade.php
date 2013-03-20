{{ render('fb._splash') }}




<div class="width960" id="create_card">

	{{ HTML::link('fb/cards', 'Выбрать другое фото', array('class'=>'pull-right btn btn-primary btn-large')) }}
	<h3>Выбор фотографии</h3>

	{{ Form::open('postcard/create','post') }}
	<div class="frame">
		<div class="card">
			{{ HTML::image(Image::$upload.$image->cards_filename) }}
		</div>
		<div class="fields">
			<div class="field">
					<input type="text" name="title" maxlength="32" placeholder="Заголовок" title="Кликните здесь чтобы изменить заголовок" class="active">
			</div>

			<div class="field">
					<textarea name="text" maxlength="280" placeholder="Текст поздравления" title="Кликните здесь чтобы изменить текст поздравления" class="active"></textarea>
					<pre class="pseudo_text"></pre>
				<a class="select_text">Выбрать готовый текст поздравления</a>
			</div>

			<div class="field">
				<input type="text" maxlength="28" name="to" placeholder="Кому"  title="Кликните здесь чтобы изменить кому" class="active">
			</div>

			<div class="field">
				<input type="text" maxlength="28" name="from" placeholder="От кого" title="Кликните здесь чтобы изменить от кого" class="active">
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
	{{ Form::hidden('render','fb') }}

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


</script>