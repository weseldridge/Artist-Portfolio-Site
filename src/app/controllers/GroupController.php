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


/*
* ----------------------------------------------------------------------------
*							POST METHODS
* ----------------------------------------------------------------------------
*/




/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}