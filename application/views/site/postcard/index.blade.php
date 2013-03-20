<div class="splash">
	<div class="decor-top"></div>
	<div class="width960">
		<div class="panel">
			<strong>ШАГ 1 ИЗ 2:</strong>
			<h1>Выбор фотографии</h1>
			<div class="text">
				Выберите фото, из которого вы хотите сделать открытку.
			</div>
		</div>
	</div>
	<div class="decor-bottom"></div>
</div>

<div class="width960">

<div class="row-fluid gallery-row">
	<div class="span3">
		<nav class="nav nav-list nav-category">
			<li><h5>Категории:</h5></li>
			<li class="active"><a rel="0">Все</a></li>
		@foreach($categories as $category)
			<li><a rel="{{ $category->id }}">{{ $category->title }}</a></li>
		@endforeach
		</nav>
	</div>

	<div class="span9">
		<ul class="gallery_images thumbnails" rel="0">
			@foreach($images as $img)
				<li>
					<div class="thumbnail">
						<a href="{{ Image::$upload.$img->upload->cards_filename }}" class="shadowbox" rel="{{ $img->id }}">
							<img src="{{ Image::$upload.$img->upload->small_filename }}" alt="{{ $img->title }}">
						</a>
					</div>
				</li>
			@endforeach
		</ul>
		@foreach($categories as $gallery)
		<ul class="gallery_images thumbnails" rel="{{ $gallery->id }}">
			@foreach($gallery->images as $img)
				<li>
					<div class="thumbnail">
						<a href="{{ Image::$upload.$img->upload->cards_filename }}" class="shadowbox" rel="{{ $img->id }}">
							<img src="{{ Image::$upload.$img->upload->small_filename }}" alt="{{ $img->title }}">
						</a>
					</div>
				</li>
			@endforeach
		</ul>
		@endforeach

		<div class="pager"></div>
	</div>
	
</div>

</div>
<div class="clearfix"></div>