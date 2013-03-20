<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo asset('js/jquery.js')?>"></script>
<script src="<?php echo asset('js/admin/jquery-ui-custom.js')?>"></script>
<script src="<?php echo asset('js/admin/bootstrap.js')?>"></script>

<?php
if(Config::get('application.wysiwyg')=='ckeditor')
{
	?>
<script src="<?php echo asset('js/admin/ckeditor/ckeditor.js')?>"></script>
<script src="<?php echo asset('js/admin/ckfinder/ckfinder.js')?>"></script>
<script type="text/javascript">
	$('.wysiwyg').each(function(){
		var editor = CKEDITOR.replace($(this).attr('id'));
		CKFinder.setupCKEditor( editor, '<?php echo asset('js/admin/ckfinder/')?>' );
	});
</script>
<?php
}

if(Config::get('application.wysiwyg')=='wysihtml5')
{
	?>
<script src="<?php echo asset('js/admin/wysiwyg.js')?>"></script>
<script src="<?php echo asset('js/admin/wysiwyg-bs.js')?>"></script>
<script type="text/javascript">
	if($('#content')){
		$('#content').wysihtml5();
	}
	if($('.editable_text')){
		$('.editable_text').each(function(index,elem) {
			$(elem).wysihtml5();
		});
	}
	$('.wysiwyg').each(function(){
		$(this).wysihtml5();
	});
</script>
<?php
}