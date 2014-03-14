<?php

class GroupController extends BaseController {

protected $layout = 'layouts.master';
/*
* ----------------------------------------------------------------------------
*							GET METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
public function showGroup() {
	$groups = Group::all();
	$this->layout->content = View::make('groups.main')->with('groups', $groups);
}

/**
*
*/
public function showThisGroupById($id) {
	
	$group = Group::find($id);
	$galleries = Group::find($id)->galleries;
	$this->layout->content = View::make('groups.thisGroup')->with('id',$group->id)
														   ->with('group', $group)
														   ->with('galleries', $galleries);
}

/**
*
*/
public function showThisGroupByName($input) {
	
	$group = Group::where('name', '=', $input);
	$id = $group->id;

	$this->layout->content = View::make('groups.thisGroup')->with('id',$id)->with('group', $group);
}


/**
*
*/
public function showEditThisGroup($id) {
	$group = Group::find($id);
	$items = Item::all();
	$this->layout->content = View::make('groups.editThis')->with('id', $id)
														  ->with('group', $group)
														  ->with('items', $items);
}

/**
*
*/
public function showAddGroup() {
	$items = Item::all();
	$this->layout->content = View::make('groups.addGroup')->with('items', $items);
}

/*
* ----------------------------------------------------------------------------
*							POST METHODS
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
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}