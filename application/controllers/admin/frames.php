<?php
class Admin_Frames_Controller extends Admin_Controller
{

	public $restful = true;
	public $views = 'frames';

	public function __construct(){
		parent::__construct();
		Frame::$upload_path = path('public').Frame::$upload_path;
	}

	public function get_index()
	{
		$this->data['galleries'] = FrameGallery::order_by('title')->get();
		return View::make('admin.'.$this->views.'.index',$this->data);
	}

	public function get_edit($object_id = false){
		// Do our checks to make sure things are in place
		if(!$object_id) return Redirect::to('admin/'.$this->views);
		$object = Frame::find($object_id);
		if(!$object) return Redirect::to('admin/'.$this->views);
		$this->data['image'] = $object;
		$this->data['galleries'] = FrameGallery::all();
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

	/**
	 * Deletes our CMS section on POST, checks to see if ID exists first
	 * @return redirect
	 */
	public function post_delete(){

		$rules = array(
			'id'  => 'required|exists:frames',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error','You tried to delete an frame that doesn\'t exist.');
			return Redirect::to('admin/'.$this->views.'');
		}else{
			Uploadr::remove('image',Input::get('id'));
			$frame = Frame::find(Input::get('id'));
			$frame->delete();
			Messages::add('success','Frame Removed');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Creates our section when POSTed to. Performs snazzy validation.
	 * @return [type] [description]
	 */
	public function post_create(){
		$rules = array(
			'title'  => 'required|max:255',
			'gallery_id'  => 'required|integer|exists:frames_gallery,id', // for one category
			'image' => 'required|image|max:2500'
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/create')->with_input();
		}else{
			$frame = new Frame;
			$frame->title = Input::get('title');
			$frame->gallery_id = Input::get('gallery_id');
			$frame->save();

			$upload_details = array(
				'upload_field_name'=>'image',
				'upload_type'=>'frame',
				'upload_link_id'=>$frame->id,
				'remove_existing_for_link'=>true,
				'title'=>$frame->title,
				'path_to_store'=>Frame::$upload_path,
				'resizing'=>array(
					'small'=>Frame::$size_small
				)
			);
			$upload = Uploadr::upload($upload_details);

			Messages::add('success','Frame Added');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Update the order of the returned image IDs
	 * @return boolean
	 */
	public function post_update_order(){
		$decoded = json_decode(Input::get('data'));
		if($decoded){
			foreach($decoded as $order=>$id){
				if($img = Image::find($id)){
					$img->order = $order;
					$img->save();
				}
			}
		}
		return true;
	}

	public function post_edit(){
		$rules = array(
			'id'  => 'required|exists:frames',
			'title'  => 'required|max:255',
			'gallery_id'  => 'required|integer|exists:frames_gallery,id', // for one category
			'image' => 'image|max:2500'
		);

		

		$validation = Validator::make(Input::get(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/edit/'.Input::get('id'))->with_input();
		}else{      
			$frame = Frame::find(Input::get('id'));
			$frame->title = Input::get('title');
			$frame->gallery_id = Input::get('gallery_id');
			$frame->save();
			
			$upload_details = array(
				'upload_field_name'=>'image',
				'upload_type'=>'frame',
				'upload_link_id'=>$frame->id,
				'remove_existing_for_link'=>true,
				'title'=>$frame->title,
				'path_to_store'=>Frame::$upload_path,
				'resizing'=>array(
					'small'=>Frame::$size_small
				)
			);
			$upload = Uploadr::upload($upload_details);

			Messages::add('success','Frame Saved');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Delete an upload from a section
	 * @return [type] [description]
	 */
	public function post_delete_upload(){
		$in = explode('-',Input::get('id'));
		if($in && count($in) == 2){
			$object_id = $in[0];
			$object_upload_id = $in[1];
			$object = Frame::find($object_id);
			if($object){
				$upload = $object->uploads()->where('id','=',$object_upload_id);
				if($upload){
					Uploadr::remove_singular($object_upload_id);
					return Redirect::to('admin/'.$this->views.'/edit/'.$object_id);
				}
			}
		}
		return Redirect::to('admin/'.$this->views);
	}

	public function get_create(){
		$this->data['create'] = true;
		$this->data['galleries'] = FrameGallery::all();
		$this->data['image'] = new Frame;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

}