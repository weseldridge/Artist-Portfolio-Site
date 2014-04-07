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

	public function showAdminSettingsSite() {
		$this->layout->content = View::make('admins.site')->with('title','Site Settings')->with('title','Site Settings');
	}

	public function showAdminSettingsUser() {
		$this->layout->content = View::make('admins.user')->with('title','Users Settings')->with('title','User Settings');

	}

	public function showAdminHome() {
		$this->layout->content = View::make('admins.main')->with('title','Users Settings')->with('title','Admin Home');

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
		$this->layout->content = View::make('groups.editThis')->with('id', $id)
															  ->with('group', $group)
															  ->with('title','Edit This Group');
	}

	/**
	*
	*/
	public function showAllGroup() {
		$group = Group::all();
		$this->layout->content = View::make('groups.allGroup')->with('groups', $group)
															  ->with('title','All Groups');
	}

	/**
	*
	*/
	public function showAddGroup() {
		$items = Item::all();
		$this->layout->content = View::make('groups.addGroup')->with('title','Add a New Group');
	}

	/**
	*
	*/
	public function doToggleGroup($id){
		$group = Group::find($id);
		if($group->is_active) {
			$group->is_active = 0;
		} else {
			$group->is_active = 1;
		}
		$group->save();

		return Redirect::to('group/all');
	}

	/**
	*
	*/
	public function doDeleteGroup($id) {
		$group = Group::find($id);
		$group->delete();

		return Redirect::to('group/all');
	}

	/*
	* ----------------------------------------------------------------------------
	*							Gallery METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*/
	public function showAllGallery() {
		$galleries = Gallery::all();
		$this->layout->content = View::make('galleries.allGallery')->with('title','All Galleries')
																   ->with('galleries', $galleries);
	}

	/**
	*
	*/
	public function showAddGallery() {
		$groups = Group::all();
		$this->layout->content = View::make('galleries.addGallery')->with('title','Add a New Gallery')
																   ->with('groups', $groups);
	}

	/**
	*
	*/
	public function showEditThisGallery($id) {
		$gallery = Gallery::find($id);
		$groups = Group::all();
		$this->layout->content = View::make('galleries.editThis')->with('id', $id)
																 ->with('gallery', $gallery)
																 ->with('groups', $groups)
																 ->with('title','Edith This Gallery - ');
	}

	/**
	*
	*/
	public function doToggleGallery($id) {
		$gallery = Gallery::find($id);
		if($gallery->is_active) {
			$gallery->is_active = 0;
		} else {
			$gallery->is_active = 1;
		}
		$gallery->save();

		return Redirect::to('gallery/all');
	}

	/**
	*
	*/
	public function doDeleteGallery($id) {
		$gallery = Gallery::find($id);
		$gallery->delete();

		return Redirect::to('gallery/all');
	}

	/*
	* ----------------------------------------------------------------------------
	*							ITEM METHODS
	* ----------------------------------------------------------------------------
	*/
	/**
	*
	*/
	public function showAllItem() {
		$items = Item::all();
		$this->layout->content = View::make('items.allItem')->with('title', 'All Items')
															->with('items', $items);
	}

	/**
	*
	*/
	public function showAddItem() {
		$galleries = Gallery::all();
		$this->layout->content = View::make('items.addItem')->with('galleries', $galleries)
															->with('title', 'Add a New Item');
	}
	/**
	*
	*/
	public function showEditThisItem($id) {
		$item = Item::find($id);
		$galleries = Gallery::all();
		$this->layout->content = View::make('items.editThis')->with('id', $id)
															 ->with('item', $item)
															 ->with('galleries', $galleries)
															 ->with('title','Edit This Item');
	}


	public function doToggleItem($id) {

		// Find Item and update the is_active field
		$item = Item::find($id);
		if($item->is_active) {
			$item->is_active = 0;
		} else {
			$item->is_active = 1;
		}
		$item->save();

		// Show all items template
		return Redirect::to('item/all');
	}

	public function doDeleteItem($id)
	{
		$item = Item::find($id);
		$item->delete();

		// Show all items template
		return Redirect::to('item/all');
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

			return Redirect::to('group/all')->with('message', 'Group successfully updated.')
											->with('title', 'All Group');
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
			if(Input::hasFile('file')) {

				// Get the files name to remove ' ' spaces and replace them with _
				$fileName = Input::file('file')->getClientOriginalName();
				$fileName = str_replace(' ', '_', $fileName);

				// Upload file to server
				$destinationPath =	public_path() . '/assets/images/groups/';
				Input::file('file')->move($destinationPath, $fileName);

				$group = new Group;
		    $group->name = Input::get('name');
		    $group->description = Input::get('description');
				$group->resource = $filename;
		    $group->save();

		    return Redirect::to('group/all')->with('message', 'Group successfully added.')
		    								->with('title', 'All Group');
			}
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

			return Redirect::to('gallery/all')->with('message', 'Gallery successfully updated.')
											  ->with('title', 'All Gallery');
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
			if(Input::hasFile('file')) {
				// Get the files name to remove ' ' spaces and replace them with _
				$fileName = Input::file('file')->getClientOriginalName();
				$fileName = str_replace(' ', '_', $fileName);

				// Upload file to server
				$destinationPath =	public_path() . '/assets/images/gallery/';
				Input::file('file')->move($destinationPath, $fileName);

				$gallery = new Gallery;
		    $gallery->name = Input::get('name');
		    $gallery->description = Input::get('description');
		    $gallery->groups_id = Input::get('group_id');
				$gallery->resource = $fileName;
		    $gallery->save();

		    return Redirect::to('gallery/all')->with('message', 'Gallery successfully added.')
		    								  ->with('title', 'All Gallery');
				}
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
			$item->gallery_id = Input::get('gallery_id');
			//$item->date = Input::get('date');
			$item->save();


			return Redirect::to('item/all')->with('message', 'Item successfully updated.')
										   ->with('title', 'All Item');
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
			if(Input::hasFile('file')) {
				// Get the files name to remove ' ' spaces and replace them with _
				$fileName = Input::file('file')->getClientOriginalName();
				$fileName = str_replace(' ', '_', $fileName);

				// Upload file to server
				$destinationPath =	public_path() . '/assets/images/items/';
				Input::file('file')->move($destinationPath, $fileName);

				// Create a new item
				$item = new Item;
				$item->name = Input::get('name');
				$item->description = Input::get('description');
				$item->price = Input::get('price');
				$item->gallery_id = Input::get('gallery_id');
				$item->resource = $fileName;
				$item->save();
			}
			return Redirect::to('item/all')->with('message', 'Item successfully added.')
										   ->with('title', 'All Item');
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
