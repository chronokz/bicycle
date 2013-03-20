<?php
class Admin_Textes_Controller extends Admin_Controller
{

	public $restful = true;
	public $views = 'textes';

	public function get_index()
	{
		return View::make('admin.'.$this->views.'.index',
			array(
				'textes' => Text::get()
			)
		);
	}

	public function get_edit($object_id = false){
		// Do our checks to make sure things are in place
		if(!$object_id) return Redirect::to('admin/'.$this->views);
		$object = Text::find($object_id);
		if(!$object) return Text::to('admin/'.$this->views);
		$this->data['text'] = $object;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

	/**
	 * Deletes our CMS text on POST, checks to see if ID exists first
	 * @return redirect
	 */
	public function post_delete(){

		$rules = array(
			'id'  => 'required|exists:textes',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error','You tried to delete a text that doesn\'t exist.');
			return Redirect::to('admin/'.$this->views.'');
		}else{
			Uploadr::remove('text',Input::get('id'));
			$text = Text::find(Input::get('id'));
			$text->delete();
			Messages::add('success','Text Removed');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	/**
	 * Creates our text when POSTed to. Performs snazzy validation.
	 * @return [type] [description]
	 */
	public function post_create(){
		$rules = array(
			'text'  => 'required',
			'lang'  => 'required',

		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/create')->with_input();
		}else{
			$text = new Text;
			$text->text = Input::get('text');
			$text->lang = Input::get('lang');
			$text->save();
			
			Messages::add('success','Text Added');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function post_edit(){
		$rules = array(
			'id'  => 'required|exists:textes',
			'text'  => 'required',
			'lang'  => 'required',
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails())
		{
			Messages::add('error',$validation->errors->all());
			return Redirect::to('admin/'.$this->views.'/edit/'.Input::get('id'))->with_input();
		}else{
			$text = Text::find(Input::get('id'));
			$text->text = Input::get('text');
			$text->lang = Input::get('lang');
			$text->save();

			Messages::add('success','Text Saved');
			return Redirect::to('admin/'.$this->views.'');
		}
	}

	public function get_create(){
		$this->data['create'] = true;
		return View::make('admin.'.$this->views.'.form',$this->data);
	}

}