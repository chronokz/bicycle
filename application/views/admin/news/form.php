<?php echo View::make('admin.inc.meta', get_defined_vars() )->render()?>
		<title><?php echo ADMIN_TITLE?></title>
	</head>
	<body>
		<?php echo View::make('admin.inc.header', get_defined_vars() )->render()?>
		<div class="container">

			<div class="row-fluid">

				<div class="span3"> <!-- Sidebar -->
					<div class="well">
						<?php echo View::make('admin.inc.sidebar', get_defined_vars() )->render()?>
					</div>
				</div> <!-- /Sidebar -->

				<div class="span9 crud">
					<h1><?php echo ( $create ? 'New Article' : 'Edit Article' )?></h1>
					<?php echo Messages::get_html()?>
					<?php echo Form::open_for_files('admin/news/'.( $create ? 'create' : 'edit' ), 'POST', array('class'=>'form-horizontal'));?>
					<?php if(!$create): ?> <input type="hidden" name="id" value="<?php echo $article->id?>" /> <?php endif; ?>
					 
					<fieldset>
						<legend>Basic Information</legend>

						<div class="control-group">
							<?php echo Form::label('title', 'Article Title',array('class'=>'control-label'))?>
							<div class="controls">
								<?php echo Form::text('title',  ( Input::old('title') || $create ? Input::old('title') : $article->title ),array('placeholder'=>'Enter Article Title...'))?>
							</div>
						</div>

						<div class="control-group">
							<?php echo Form::label('source_link', 'VoxPopuli Link',array('class'=>'control-label'))?>
							<div class="controls">
								<?php echo Form::text('source_link',  ( Input::old('source_link') || $create ? Input::old('source_link') : $article->source_link ),array('placeholder'=>'Enter Article Title...'))?>
							</div>
						</div>

						<div class="control-group">
							<?php echo Form::label('content', 'Article Content',array('class'=>'control-label'))?>
							<div class="controls">
								<?php echo Form::textarea('content',( Input::old('content') || $create ? Input::old('content') : $article->content ),array('placeholder'=>'Enter Article Content...', 'class'=>'wysiwyg'))?>
							</div>
						</div>

						
					</fieldset>

					<fieldset>
						<legend>Images</legend>
						<div class="control-group">
							<?php echo Form::label('content', 'Upload Image',array('class'=>'control-label'))?>
							<div class="controls">
								<input type="file" name="image" value="<?php echo Input::old('file')?>" />
							</div>
						</div>
					</fieldset>
					<?php
						if(!$create && $article->uploads){
					?>
					<fieldset><legend>Manage Current Images</legend>
					<ul class="thumbnails">
						<?php foreach($article->uploads()->order_by('order','asc')->get() as $upload){ ?>
							<li class="span3" rel="<?php echo $upload->id?>">
								<div class="thumbnail">
									<img src="<?php echo asset('uploads/'.$upload->small_filename)?>" alt="">
									<div class="caption">
										<p><small><strong>Uploaded:</strong> <?php echo date('j M Y',strtotime($upload->created_at))?></small></p>
										<a class="delete_toggler label label-inverse" rel="<?php echo $upload->id?>">Drag To Order</a>
										<a class="delete_toggler label label-important" rel="<?php echo $upload->id?>">Delete</a>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
					</fieldset>
					<?php } ?>


					<div class="form-actions">
						<a class="btn" href="<?php echo url('admin/news')?>">Go Back</a>
						<input type="submit" class="btn btn-primary" value="<?php echo ($create ? 'Create Article' : 'Save Article')?>" />
					</div>
					<?php echo Form::close();?>
				</div>

			</div>

		</div> <!-- /container -->

		<?php echo View::make('admin.inc.scripts', get_defined_vars() )->render()?>
		<?php if(!$create): ?>
			<div class="modal hide fade" id="delete_image">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Are You Sure?</h3>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this image?</p>
				</div>
				<div class="modal-footer">
					<?php echo Form::open('admin/news/delete_upload', 'POST')?>
						<a data-toggle="modal" href="#delete_image" class="btn">Keep</a>
						<input type="hidden" name="id" id="postvalue" value="" />
						<input type="submit" class="btn btn-danger" value="Delete" />
					<?php echo Form::close()?>
				</div>
			</div>
			<script>
				$( "ul.thumbnails" ).sortable({
					update: function(event, ui) {
						var order = new Array();
						$('ul.thumbnails li').each(function(index,elem) {
							order[index] = $(elem).attr('rel');
						});
						$.ajax({
							type: 'POST',
							url: "<?php echo action('admin.news@update_images_order')?>",
							data: 'data='+JSON.stringify(order),
						});
					}
				});
				$( "ul.thumbnails" ).disableSelection();

				$('#delete_image').modal({
					show:false
				}); // Start the modal

				// Populate the field with the right data for the modal when clicked
				$('.delete_toggler').each(function(index,elem) {
						$(elem).click(function(){
							$('#postvalue').attr('value','<?php echo $article->id?>-'+$(elem).attr('rel'));
							$('#delete_image').modal('show');
						});
				});
			</script>
		<?php endif; ?>
	</body>
</html>
