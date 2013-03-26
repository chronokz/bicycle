<?php

class Layout {

	public static function admin($view, $layout_data = array(), $data = array())
	{
		return View::make('admin.layout', $layout_data)
			->nest('content', 'admin.'.$view, $data);
	}

	public static function view($view, $data=array(), $title='')
	{
		return View::make('site.layout', array(
			'content' => View::make('site.'.$view, $data),
			'title' => $title
		));
	}

}