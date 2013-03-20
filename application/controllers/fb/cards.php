<?php

class Fb_Cards_Controller extends Fb_Controller
{
	public $restful = true;
	public $path = '/uploads/generate/';

	public function __construct()
	{
		$this->path = 'http://'.$_SERVER['HTTP_HOST'].$this->path;
	}

	public function get_index()
	{
		return Layout::fb('cards_list',	array(
			'images' => Image::order_by('order')->get(),
			'categories' => Gallery::order_by('title')->get()
		));
	}

	public function get_unliked()
	{
		return Layout::fb('unliked');
	}

	public function get_create($image_id)
	{
		return Layout::fb('cards_create', array(
			'image' => Image::find($image_id)->upload,
			'frames'=> FrameGallery::order_by('id')->get(),
			'texts' => Text::order_by('text')->get()
		));
	}

	public function get_link($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::fb('finished',
			array(
				'method' => 'link',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename
				)
		);
	}

	public function get_social($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::fb('finished',
			array(
				'method' => 'social',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename
				)
		);
	}

	public function get_email($postcard_id)
	{
		$card = Cardslog::where('filename','=',$postcard_id)->first();
		return Layout::fb('finished',
			array(
				'method' => 'email',
				'title'	=> $card->title,
				'link'	=> $this->path.$card->filename,
				'recipients' => explode(',', $card->emails)
				)
		);
	}

}