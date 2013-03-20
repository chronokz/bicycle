<?php
class Frame extends Eloquent {

	public static $timestamps = true;
	public static $table = 'frames';
	public static $upload_path = 'uploads/frames/';
	public static $upload = 'uploads/frames/';
	public static $size_small = array('w'=>140, 'h'=>100);

	public function gallery()
	{
		return $this->belongs_to('FrameGallery');
	}

	public function upload()
	{
		return $this->has_one('Upload', 'link_id')->where('link_type', '=', 'frame');	
	}

}