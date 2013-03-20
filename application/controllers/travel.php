<?php
class Travel_Controller extends Base_Controller
{

	public $restful = true;

	/**
	 * This method checks to see if a view exists and if it does loads it along with any
	 * associated data from the database. It then checks to see if a function exists for
	 * the passed in page name (substituting dashes for underscores and runs that) if it exists.
	 * @param  string  $page            The page name
	 * @param  string  $variable        Allows us to pass a second variable to things
	 * @return view                     Ideally a view of some kind
	 */
	public function get_index()
	{
		$per_page = 3;
		$infopage = Page::where('slug','=', Request::route()->controller)->first();
		return Layout::view('travel.index',
			array(
				'news' => News::order_by('created_at','desc')->paginate($per_page),
				'page' => $infopage->section[0]
			),
			$infopage->title
		);

	}

	public function get_view($link){
		return Layout::view('travel.view',
			array(
				'news'=>News::get_page($link)
			)
		);
	}

}