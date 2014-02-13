<?php

class GalleryController extends BaseController {


protected $layout = 'layouts.master';

/*
* ----------------------------------------------------------------------------
*							GET METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
public function showGallery() {
	$this->layout->content = View::make('galleries.main');
}

/**
*
*/
public function showThisGallery($input) {
	$this->layout->content = View::make('galleries.this');
}

/**
*
*/
public function showAddGallery() {
	$this->layout->content = View::make('galleries.add');
}

/**
*
*/
public function showEditThisGallery($id) {
	$this->layout->content = View::make('galleries.editThis');
}

/*
* ----------------------------------------------------------------------------
*							POST METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
public function doAddGallery() {

}

/**
*
*/
public function doEditThisGallery($id) {

}


/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}