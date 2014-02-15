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
	$this->layout->content = View::make('galleries.thisGallery');
}

/**
*
*/
public function showAddGallery() {
	$this->layout->content = View::make('galleries.addGallery');
}

/**
*
*/
public function showEditThisGallery($id) {
	$gallery = Gallery::find($id);
	$this->layout->content = View::make('galleries.editThis')->with('id', $id)
															 ->with('gallery', $gallery);
}

/*
* ----------------------------------------------------------------------------
*							POST METHODS
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
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}