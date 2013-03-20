<?php
class Admin_Tips_Controller extends Admin_Controller
{

	public $restful = true;
	public $views = 'tips';

	public function get_index()
	{
		return View::make('admin.'.$this->views.'.index',
			array(
				'tips' => Tips::get()
			)
		);
	}

	public function get_edit($object_id = false){
		// Do our checks to make sure things are in place
		if(!$object_id) return Redirect::to('admin/'.$this->views);
		$object = Tips::find($object_id);
		if(!$object) return Tips::to('admin/'.$this->views);
		$this->data['tips'] = $object;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

	/**
	 * Deletes our CMS text on POST, checks to see if ID exists first
	 * @return redirect
	 */
	public function post_delete(){

		$rules = array(
			'id'  => 'required|exists:tips'
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error','You tried to delete a text that doesn\'t exist.');
			return Redirect::to('admin/'.$this->views.'');
		}else{
			$tips = Tips::find(Input::get('id'));
			$tips->delete();
			Messages::add('success','Tips Removed');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Creates our text when POSTed to. Performs snazzy validation.
	 * @return [type] [description]
	 */
	public function post_create(){
		$rules = array(
			'text'  => 'required'

		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/create')->with_input();
		}else{
			$tips = new Tips;
			$tips->text = Input::get('text');
			$tips->save();
			
			Messages::add('success','Tips Added');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function post_edit(){
		$rules = array(
			'id'  => 'required|exists:tips',
			'text'  => 'required'
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/edit/'.Input::get('id'))->with_input();
		}else{
			$tips = Tips::find(Input::get('id'));
			$tips->text = Input::get('text');
			$tips->save();

			Messages::add('success','Tips Saved');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function get_create(){
		$this->data['create'] = true;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

}