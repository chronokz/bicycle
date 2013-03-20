<?php
class FrameGallery extends Eloquent {

	public static $timestamps = true;
	public static $table = 'frames_gallery';

	public function frame()
	{
		return $this->has_many('Frame','gallery_id')->order_by('title','asc');
	}
}