<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.admin';
	/*
	* ----------------------------------------------------------------------------
	* ----------------------------------------------------------------------------
	*							GET METHODS
	* ----------------------------------------------------------------------------
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function showAdmin(){;
		$this->layout->content = View::make('admins.main');
	}

	/**
	*
	*/
	public function showAdminUser(){
		$this->layout->content = View::make('admins.user');
	}

	/*
	* ----------------------------------------------------------------------------
	*							GROUP METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function showEditThisGroup($id) {
		$group = Group::find($id);
		$items = Item::all();
		$this->layout->content = View::make('groups.editThis')->with('id', $id)
															  ->with('group', $group)
															  ->with('items', $items)
															  ->with('title','Edit This Group');
	}

	/**
	*
	*/
	public function showAddGroup() {
		$items = Item::all();
		$this->layout->content = View::make('groups.addGroup')->with('items', $items)
															  ->with('title','Add a New Group');
	}

	/*
	* ----------------------------------------------------------------------------
	*							Gallery METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function showAddGallery() {
		$this->layout->content = View::make('galleries.addGallery')->with('title','Add a New Gallery');
	}

	/**
	*
	*/
	public function showEditThisGallery($id) {
		$gallery = Gallery::find($id);
		$this->layout->content = View::make('galleries.editThis')->with('id', $id)
																 ->with('gallery', $gallery)
																 ->with('title','Edith This Gallery');
	}

	/*
	* ----------------------------------------------------------------------------
	*							ITEM METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function showEditThisItem($id) {
		$item = Item::find($id);
		$this->layout->content = View::make('items.editThis')->with('id', $id)
															 ->with('item', $item)
															 ->with('title','Edit This Item');
	}

	/**
	*
	*/
	public function showAddItem() {
		$this->layout->content = View::make('items.addItem')->with('galleries', false)->with('title', 'Add a New Item');
	}


	/*
	* ----------------------------------------------------------------------------
	* ----------------------------------------------------------------------------
	*							POST METHODS
	* ----------------------------------------------------------------------------
	* ----------------------------------------------------------------------------
	*/

	/*
	* ----------------------------------------------------------------------------
	*							GROUP METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function doEditThisGroup($id) {

		// validate the info, create rules for the inputs
		$rules = array(
				'name'    		=> 'required|min:3|max:49|unique:groups',
				'description' 	=> 'min:3|max:250',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('group/edit/' . $id)
				->withErrors($validator);
		} else {
			$group = Group::find($id);
			$group->name = Input::get('name');
			$group->description = Input::get('description');
			$group->save();

			return Redirect::to('/')->with('message', 'Group successfully updated.');
		}

	}

	/**
	*
	*/
	public function doAddGroup() {

		$rules = array(
				'name' 			=> 'required|min:3|max:49|unique:groups',
				'description'	=> 'min:3|max:250',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('group/add')->with('message', 'The following errors occurred: ')->withErrors($validator)->withInput();
		} else {
			$group = new Group;
		    $group->name = Input::get('name');
		    $group->description = Input::get('description');
		    $group->save();

		    return Redirect::to('/')->with('message', 'Group successfully added.');
		}
	}

	/*
	* ----------------------------------------------------------------------------
	*							Gallery METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function doEditThisGallery($id) {
		// validate the info, create rules for the inputs
		$rules = array(
				'name'    		=> 'required|min:3|max:49|unique:groups',
				'description' 	=> 'min:3|max:250',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);
		
		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('gallery/edit/' . $id)
				->withErrors($validator);
		} else {
			$gallery = Gallery::find($id);
			$gallery->name = Input::get('name');
			$gallery->description = Input::get('description');
			$gallery->save();

			return Redirect::to('/')->with('message', 'Gallery successfully updated.');
		}
	}

	/**
	*
	*/
	public function doAddGallery() {
		$rules = array(
				'name' 			=> 'required|min:3|max:49|unique:groups',
				'description'	=> 'min:3|max:250',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('gallery/add')->with('message', 'The following errors occurred: ')->withErrors($validator)->withInput();
		} else {
			$gallery = new Gallery;
		    $gallery->name = Input::get('name');
		    $gallery->description = Input::get('description');
		    $gallery->save();

		    return Redirect::to('/')->with('message', 'Gallery successfully added.');
		}
	}

	/*
	* ----------------------------------------------------------------------------
	*							ITEM METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	* We validate and process the item being updated
	*
	* @param void
	* @return Redirect A redirect to a new page
	*/
	public function doEditThisItem($id) {

		// validate the info, create rules for the inputs
		$rules = array(
			'name'    => 'required',
			'description' => 'required',
			);

			// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('item/edit/' . $id)
				->withErrors($validator);
		} else {
			$item = Item::find($id);
			$item->name = Input::get('name');
			$item->description = Input::get('description');
			$item->price = Input::get('price');
			//$item->date = Input::get('date');
			$item->save();

			return Redirect::to('/')->with('message', 'Item successfully updated.');
		}
	}

	/**
	*	We validate and process the item being added
	*
	*	@param void
	*	@return Redirect a redirect to a new page. 
	*/
	public function doAddItem() {
		// validate the info, create rules for the inputs
		$rules = array(
			'name'    => 'required',
			'description' => 'required',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('item/add')
				->withErrors($validator);
		} else {
			$item = new Item;
			$item->name = Input::get('name');
			$item->description = Input::get('description');
			$item->price = Input::get('price');
			$item->save();

			return Redirect::to('/')->with('message', 'Item successfully added.');
		}
	}

	/**
	*
	*/
	public function doAdminUser(){
		
	}

	/*
	* ----------------------------------------------------------------------------
	*							HELPER METHODS
	* ----------------------------------------------------------------------------
	*/

}