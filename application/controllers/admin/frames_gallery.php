<?php
class Admin_Frames_Gallery_Controller extends Admin_Controller
{

	public $restful = true;
	public $views = 'frames_gallery';

	public function get_index()
	{
		$this->data['galleries'] = FrameGallery::order_by('title','asc')->get();
		return View::make('admin.'.$this->views.'.index',$this->data);
	}

	public function get_edit($object_id = false){
		// Do our checks to make sure things are in place
		if(!$object_id) return Redirect::to('admin/'.$this->views);
		$object = FrameGallery::find($object_id);
		if(!$object) return FrameGallery::to('admin/'.$this->views);
		$this->data['gallery'] = $object;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

	/**
	 * Deletes our CMS gallery on POST, checks to see if ID exists first
	 * @return redirect
	 */
	public function post_delete(){

		$rules = array(
			'id'  => 'required|exists:frames_gallery',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error','You tried to delete a category that doesn\'t exist.');
			return Redirect::to('admin/'.$this->views.'');
		}else{
			Uploadr::remove('category',Input::get('id'));
			$gallery = FrameGallery::find(Input::get('id'));
			if($gallery->frame){
				foreach($gallery->frame as $img){
					Uploadr::remove('frame',$img->id);
				}
			}
			$gallery->frame()->delete();
			$gallery->delete();
			Messages::add('success','Category &amp; All Frames Removed');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Creates our gallery when POSTed to. Performs snazzy validation.
	 * @return [type] [description]
	 */
	public function post_create(){
		$rules = array(
			'title'  => 'required|max:255',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/create')->with_input();
		}else{
			$gallery = new FrameGallery;
			$gallery->title = Input::get('title');
			$gallery->save();
			
			Messages::add('success','Category Added');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function post_edit(){
		$rules = array(
			'id'  => 'required|exists:frames_gallery',
			'title'  => 'required|max:255',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/edit')->with_input();
		}else{
			$gallery = FrameGallery::find(Input::get('id'));
			$gallery->title = Input::get('title');
			$gallery->save();

			Messages::add('success','Category Saved');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function get_create(){
		$this->data['create'] = true;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

}