<?php
class Admin_Dash_Controller extends Admin_Controller
{
	public $restful = true;

	public function get_index()
	{
		return Layout::admin('dash.index', $this->layout_data, $this->data);
	}

	// Login Stuff
	public function get_login(){
		return View::make('admin.login');
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