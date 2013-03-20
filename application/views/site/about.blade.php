<div class="splash">
	<div class="decor-top"></div>
	<div class="width960">
		<div class="panel">
			<h1>О проекте</h1>
			<div class="text">
				краткая информация о проекте
			</div>
		</div>
	</div>
	<div class="decor-bottom"></div>
</div>
	
<div class="width960">
<div class="row-fluid">
	<div class="span9">
	<?php
		if($page){
			if($page->section){
				$i = 0;
				foreach($page->section as $section){
					echo $i == 0 ? '<h1>'.$section->title.'</h1>' : '<h2>'.$section->title.'</h2>' ;
					if($section->uploads){
						foreach($section->uploads as $up){
							echo '<a rel="shadowbox" href="'.asset('uploads/').$up->filename.'"><img class="section_image" src="'.asset('uploads/').$up->thumb_filename.'" /></a>';
						}
					}
					echo '<p>'.$section->content.'</p>';
				}
			}
		}
	?>
	</div>
	<div class="span3">
		{{ render('site.block.tips') }}
	</div>
</div>


</div>