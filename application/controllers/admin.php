<?php

class Admin_Controller extends Base_Controller {


    public $restful = true;
    public $name = '';
    public $layout_data = array(
            'icon' => 'file',
            'title' => 'Module'
        );

    // Our first stuff
    public function __construct(){
        // Make sure that the 'auth' function is run before ANYTHING else happens
        // With the exception of our login page (to actually login) this will
        // prevent any un-authorised use of the admin areas
    	$this->filter('before', 'auth')->except(array('login','setup'));

        // Default variable set for CRUD usage.
    	$this->data['create'] = false;

        // Get the user details from when they logged in / old sessions
    	$this->data['user'] = Auth::user();

        //$this->name = __($this->name);
    }

    /**
     * Checks to see if the user is logged in. If they aren't we get redirected to the login page
     * @return header redirect
     */
    public function auth(){
    	if (Auth::guest()) return Redirect::to('admin/login');
    }

}
