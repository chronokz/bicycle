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

				<div class="span9">
					<h1>Frames</h1>
					<a href="<?php echo action('admin.frames@create')?>" class="btn btn-primary right">New Frame</a>
					<p>You can create your frames here.</p>
					<?php echo Messages::get_html()?>
					<?php
						if($galleries){
							foreach($galleries as $gallery){
								echo '<h2>'.$gallery->title.'</h2>';
								echo '<ul class="gallery_images thumbnails">';
								foreach($gallery->frame as $img){
										echo '<li class="span2" rel="'.$img->id.'">
										<div class="thumbnail">
											<img src="'.asset(Frame::$upload.$img->upload->small_filename).'" />
											<div class="caption">
												<p>'.$img->title.'</p>
												<div class="action_buttons"><a class="label label-info" href="'.action('admin.frames@edit', array($img->id)).'">Edit</a> <a class="delete_toggler label label-important" rel="'.$img->id.'">Delete</a></div>												
											</div>
										</div></li>';
								}
								echo '</ul>';
							}
						}else{
					?>
						<div class="well">No galleries today. Why not create one using the button below.</div>
					<?php
						}
					?>
				</div>

			</div>

		</div> <!-- /container -->
		<div class="modal hide fade" id="delete_image">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Are You Sure?</h3>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this frame?</p>
			</div>
			<div class="modal-footer">
				<?php echo Form::open('admin/frames/delete', 'POST')?>
					<a data-toggle="modal" href="#delete_image" class="btn">Keep</a>
					<input type="hidden" name="id" id="postvalue" value="" />
					<input type="submit" class="btn btn-danger" value="Delete" />
				<?php echo Form::close()?>
			</div>
		</div>
		<?php echo View::make('admin.inc.scripts', get_defined_vars() )->render()?>
		<script>

			$('#delete_image').modal({
				show:false
			}); // Start the modal

			// Populate the field with the right data for the modal when clicked
			$('.delete_toggler').each(function(index,elem) {
					$(elem).click(function(){
						$('#postvalue').attr('value',$(elem).attr('rel'));
						$('#delete_image').modal('show');
					});
			});
		</script>
	</body>
</html>
