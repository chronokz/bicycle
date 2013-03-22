<?php

class Admin_Page_Controller extends Admin_Controller
{
	public $view = 'page.';

	public function get_index()
	{
		return Layout::admin($this->view.'index',$this->data);
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