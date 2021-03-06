<?php

class Base_Controller extends Controller {

	// Setup our $data ($this->data) variable for use throughout our controllers
	public $restful = true;
	public $data = array();
	public $name = '';
	public $layout_data = array(
			'title' => 'Заголовок'
		);

	
	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}