{{ render('fb._splash') }}

<div class="width960">
	

	<div class="btn-group pull-right">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			Все фотографии
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu pull-right nav-gallery">
			<li class="active"><a rel="0">Все</a></li>
			@foreach($categories as $category)
				<li><a rel="{{ $category->id }}">{{ $category->title }}</a></li>
			@endforeach
		</ul>
	</div>

	<h3>Выбор фотографии</h3>

	<div class="row-fluid gallery-row">
		<ul class="gallery_images thumbnails" rel="0">
			@foreach($images as $img)
				<li>
					<div class="thumbnail">
						<a href="{{ URL::to('fb/cards/create/'.$img->id) }}" class="shadowbox" rel="{{ $img->id }}">
							<img src="{{ asset(Image::$upload.$img->upload->small_filename) }}" alt="{{ $img->title }}">
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
						<a href="{{ URL::to('fb/cards/create/'.$img->id) }}" class="shadowbox" rel="{{ $img->id }}">
							<img src="{{ asset(Image::$upload.$img->upload->small_filename) }}" alt="{{ $img->title }}">
						</a>
					</div>
				</li>
			@endforeach
		</ul>
		@endforeach

		<div class="pager"></div>
	</div>

</div>
<div class="clearfix"></div>