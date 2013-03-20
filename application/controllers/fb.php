<?php

class Fb_Controller extends Base_Controller {

	// Our first stuff
	public function __construct(){
		// Make sure that the 'auth' function is run before ANYTHING else happens
		// With the exception of our login page (to actually login) this will
		// prevent any un-authorised use of the admin areas
		//$this->filter('before', 'auth')->except(array('login','setup'));

		// Default variable set for CRUD usage.
		//$this->data['create'] = false;

		// Get the user details from when they logged in / old sessions
		// $this->data['user'] = Auth::user();
	}

}
