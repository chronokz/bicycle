<div class="box">
	<div class="box-head">
		<i class="icon-table"></i>
		<span>Страницы</span>
	</div>
	<div class="box-body box-body-nopadding">
		<table class="table table-nomargin table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>Slug</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->title }}</td>
					<td>{{ $page->slug }}</td>
					<td>
						<div class="btn-group">
						  <a class="btn btn-warning">Edit</a>
						  <a class="btn btn-danger">Delete</a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
