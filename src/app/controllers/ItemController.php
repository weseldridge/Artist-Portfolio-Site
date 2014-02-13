<?php

class ItemController extends BaseController {


protected $layout = 'layouts.master';

/*
* ----------------------------------------------------------------------------
*							GET METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
public function showItem() {
	$this->layout->content = View::make('items.main');
}

/**
*
*/
public function showThisItem($id) {
	$this->layout->content = View::make('items.thisItem');
}

/**
*
*/
public function showEditThisItem($id) {
	$this->layout->content = View::make('items.editThis');
}

/**
*
*/
public function showAddItem() {
	$this->layout->content = View::make('items.addItem');
}

/*
* ----------------------------------------------------------------------------
*							POST METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
public function doEditThisItem($id) {

}

/**
*
*/
public function doAddItem() {

}


/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}