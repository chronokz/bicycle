<?php
// Define some constants
define('COMPANY_NAME','Photocard');
define('CONTACT_EMAIL','chrono@smtp.ru');
define('CONTACT_NAME','chrono');

define('TECHNICAL_NAME','Alexander Mikhailov');
define('TECHNICAL_EMAIL','chrono@smtp.ru');
define('ADMIN_TITLE','Admin Photocard');

Route::get('admin/setup',function(){
	if(Setup::setup_complete()){
		return Redirect::to('/admin');
	}else{
		return View::make('admin.setup.db');
	}
});
Route::post('admin/setup',function(){
	if(Setup::setup_complete()){
		return Redirect::to('/admin');
	}else{
        $rules = array(
            'username'=>'required|max:255','first_name'=>'required|max:255','last_name'=>'required|max:255','email'=>'required|email','password'=>'required|confirmed',
        );
        $validation = Validator::make(Input::all(), $rules);
        if ($validation->fails())
        {
            Messages::add('error',$validation->errors->all());
            return Redirect::to('/admin/setup/')->with_input();
        }else{
        	Setup::setup_database();
            $usr = new User;
            $usr->username = Input::get('username');
            $usr->email = Input::get('email');
            $usr->first_name = Input::get('first_name');
            $usr->last_name = Input::get('last_name');
            $usr->active = 1;
            $usr->admin = 1;
            $usr->password = Input::get('password');
            $usr->save();
            return Redirect::to('/admin');
        }
	}
});

// Register the admin controller
// Route::controller('admin.dash'); // I don't think I need this...
Route::controller('admin.news');
Route::controller('admin.users');
Route::controller('admin.roles');
Route::controller('admin.sections');
Route::controller('admin.gallery');
Route::controller('admin.images');
Route::controller('admin.textes');
Route::controller('admin.tips');
Route::controller('admin.pages');
Route::controller('admin.help');
Route::controller('admin.frames_gallery');
Route::controller('admin.frames');

Route::get('admin/dashboard', 'admin.dash@index');
Route::any('admin/(:any?)', array('defaults' => 'index', 'uses' => 'admin.dash@(:1)'));

// Facebook
Route::get('fb/cards', 'fb.cards@index');
Route::get('fb/cards/unliked', 'fb.cards@unliked');
Route::get('fb/cards/create/(:num)', 'fb.cards@create');
Route::get('fb/cards/link/(:any)', 'fb.cards@link');
Route::get('fb/cards/social/(:any)', 'fb.cards@social');
Route::get('fb/cards/email/(:any)', 'fb.cards@email');

// Frontend routing
Route::any('(:any)', array('uses' => 'page@index'));
Route::any('/', 'page@index');
Route::get('/postcard', 'postcard@index');
Route::get('/postcard/create/(:num)', 'postcard@create');
Route::get('/postcard/link/(:any)', 'postcard@link');
Route::get('/postcard/social/(:any)', 'postcard@social');
Route::get('/postcard/email/(:any)', 'postcard@email');
Route::post('/postcard/create', 'postcard@create');
Route::get('/travel', 'travel@index');
Route::get('/travel/view/(:any)', 'travel@view');




/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in "before" and "after" filters are called before and
| after every request to your application, and you may even create other
| filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('admin/login');
});