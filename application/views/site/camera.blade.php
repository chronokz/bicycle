<div class="splash">
	<div class="decor-top"></div>
	<div class="width960">
		<div class="panel">
			<h1>Фотоаппараты Samsung</h1>
			<div class="text">
				Узнайте по больше о современных гаджетах
			</div>
		</div>
	</div>
	<div class="decor-bottom"></div>
</div>

<div class="width960">
<div class="row-fluid">
	<div class="span9">
	@if(@page && $page->section)
		@foreach($page->section as $section)
			<div class="camera">
				@if($section->uploads)
					@foreach($section->uploads as $up)
						<img class="section_image" src="{{ asset('uploads/').$up->filename }}" />
					@endforeach
				@endif
				<div class="text">
					<h2>{{ $section->title }}</h2>
					{{ $section->content }}
				</div>
				<div class="clearfix"></div>
			</div>
		@endforeach
	@endif	
	</div>
	<div class="span3">
		{{ render('site.block.tips') }}
	</div>

</div>



</div>