<?php

class Layout {

	public static function view($view, $data=array(), $title='')
	{
		return View::make('site.layout', array(
			'content' => View::make('site.'.$view, $data),
			'title' => $title
		));
	}

	public static function fb($view, $data=array())
	{
		return View::make('fb.layout', array(
				'content' => View::make('fb.'.$view, $data)
			));
	}

}