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

	$this->layout->content = View::make('groups.main');
}

/**
*
*/
public function showThisGroup($input) {
	$this->layout->content = View::make('groups.this');
}

/**
*
*/
public function showEditThisGroup($id) {
	$this->layout->content = View::make('groups.editThis');
}

/**
*
*/
public function showAddGroup() {
	$this->layout->content = View::make('groups.add');
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

}

/**
*
*/
public function doAddGroup() {

}


/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}