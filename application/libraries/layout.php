<?php

class Layout {

	public static function admin($view, $data=array())
	{
		return View::make('admin.layout', array(
			'content' => View::make('admin.'.$view, $data)
		));
	}

	public static function view($view, $data=array(), $title='')
	{
		return View::make('site.layout', array(
			'content' => View::make('site.'.$view, $data),
			'title' => $title
		));
	}

}