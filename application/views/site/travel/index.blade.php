<div class="splash">
	<div class="decor-top"></div>
	<div class="width960">
		<div class="panel">
			<h1>Фотопутешествие Samsung</h1>
			<div class="text">
				Узнайте больше о современных Smart камерах
			</div>
		</div>
	</div>
	<div class="decor-bottom"></div>
</div>

<div class="width960">
	<div class="row-fluid">
		<div class="span9">
		<div class="page">
			<h1>{{ $page->title }}</h1>
			{{ $page->content }}

		</div>

		@foreach($news->results as $n)
			<div class="article">
				<h2>{{ $n->title }}</h2>
				{{ HTML::image(asset('uploads/'.$n->uploads[0]->filename), $n->title) }}
				{{ $n->content }}
				{{ HTML::link($n->source_link, 'Смотрите фоторепортаж на сайте voxpopuli.kz', array('target'=>'_blank')) }}
			</div>
		@endforeach
		{{ $news->links() }}
		</div>
		<div class="span3">
			{{ render('site.block.tips') }}
		</div>
	</div>
</div>