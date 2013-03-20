<?php
class Image extends Eloquent {

	public static $timestamps = true;
	public static $table = 'gallery_images';
	public static $upload_path = 'uploads/cards/';
	public static $upload = 'uploads/cards/';
	public static $size_small = array('w'=>220,'h'=>150);
	public static $size_cards = array('w'=>610,'h'=>420);

	public function gallery()
	{
		return $this->belongs_to('Gallery');
	}

	public function user()
	{
		return $this->belongs_to('User');
	}

	public function galleries()
	{
		return  $this->has_many_and_belongs_to('gallery', 'gallery_images_relation');
	}

	public function upload()
	{
		return $this->has_one('Upload', 'link_id')->where('link_type', '=', 'image');	
	}

	public function uploads()
	{
		return $this->has_many('Upload', 'link_id')->where('link_type', '=', 'image');
	}

}