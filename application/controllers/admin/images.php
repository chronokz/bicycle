<?php
class Admin_Images_Controller extends Admin_Controller
{

	public $restful = true;
	public $views = 'images';

	public function __construct(){
		parent::__construct();
		Image::$upload_path = path('public').Image::$upload_path;
		$this->upload_small = array('w'=>220,'h'=>150);
		$this->upload_cards = array('w'=>610,'h'=>420);
		//$this->upload_thumb = array('w'=>150,'h'=>150);
	}

	public function get_index()
	{
		$this->data['galleries'] = Gallery::order_by('title')->get();
		return View::make('admin.'.$this->views.'.index',$this->data);
	}

	public function get_edit($object_id = false){
		// Do our checks to make sure things are in place
		if(!$object_id) return Redirect::to('admin/'.$this->views);
		$object = Image::find($object_id);
		if(!$object) return Redirect::to('admin/'.$this->views);
		$this->data['image'] = $object;
		$this->data['galleries'] = Gallery::all();
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

	/**
	 * Deletes our CMS section on POST, checks to see if ID exists first
	 * @return redirect
	 */
	public function post_delete(){

		$rules = array(
			'id'  => 'required|exists:gallery_images',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error','You tried to delete an image that doesn\'t exist.');
			return Redirect::to('admin/'.$this->views.'');
		}else{
			Uploadr::remove('image',Input::get('id'));
			$image = Image::find(Input::get('id'));
			$image->delete();
			Messages::add('success','Image Removed');
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
			'gallery_images_relation' => 'required',
			#'gallery_id'  => 'required|integer|exists:gallery,id', // for one category
			'image' => 'required|image|max:2500'
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/create')->with_input();
		}else{
			$image = new Image;
			$image->title = Input::get('title');
			$image->created_by = $this->data['user']->id;
			#$image->gallery_id = Input::get('gallery_id'); // for one category
			$image->save();

			$upload_details = array(
				'upload_field_name'=>'image',
				'upload_type'=>'image',
				'upload_link_id'=>$image->id,
				'remove_existing_for_link'=>true,
				'title'=>$image->title,
				'path_to_store'=>Image::$upload_path,
				'resizing'=>array(
					'small'=>Image::$size_small,
					'cards'=>Image::$size_cards
				)
			);
			$upload = Uploadr::upload($upload_details);
			$image->galleries()->sync(Input::get('gallery_images_relation'));

			Messages::add('success','Image Added');
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
			'id'  => 'required|exists:gallery_images',
			'title'  => 'required|max:255',
			'gallery_images_relation' => 'required',
			#'gallery_id'  => 'required|integer|exists:gallery,id', // for one category
			'image' => 'image|max:2500'
		);
		

		$validation = Validator::make(Input::get(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/edit/'.Input::get('id'))->with_input();
		}else{          
			$image = Image::find(Input::get('id'));
			$image->title = Input::get('title');
			#$image->gallery_id = Input::get('gallery_id'); // for one category
			$image->save();

			$upload_details = array(
				'upload_field_name'=>'image',
				'upload_type'=>'image',
				'upload_link_id'=>$image->id,
				'remove_existing_for_link'=>true,
				'title'=>$image->title,
				'path_to_store'=>Image::$upload_path,
				'resizing'=>array(
					'small'=>Image::$size_small,
					'cards'=>Image::$size_cards
				)
			);
			$upload = Uploadr::upload($upload_details);
			$image->galleries()->sync(Input::get('gallery_images_relation'));

			Messages::add('success','Image Saved');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

/**
	 * Update the order of the returned image IDs
	 * @return boolean
	 */
	public function post_update_images_order(){
		$decoded = json_decode(Input::get('data'));
		if($decoded){
			foreach($decoded as $order=>$id){
				if($img = Upload::find($id)){
					$img->order = $order;
					$img->save();
				}
			}
		}
		return true;
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
			$object = Image::find($object_id);
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
		$this->data['galleries'] = Gallery::all();
		$this->data['image'] = new Image;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

}