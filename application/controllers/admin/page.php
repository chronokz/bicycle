<?php

class Admin_Page_Controller extends Admin_Controller
{
	public $view = 'page.';
	public $layout_data = array(
			'icon' => 'font',
			'title' => 'Pages'
		);


	public function get_index()
	{
		Lang::load('application', 'admin', 'ru');
		return Layout::admin($this->view.'index', $this->layout_data);
	}

	public function get_logout(){
		Auth::logout();
		return Redirect::to('admin');
	}

	public function post_login(){
		$credentials = array('username' => Input::get('username'), 'password' => Input::get('password'));
		if (Auth::attempt( $credentials ))
		{
			return Redirect::to('admin/dashboard');
		}else{
			return Redirect::to('admin/login');
		}
	}
	
}