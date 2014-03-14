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
	$galleries = Gallery::all();
	$this->layout->content = View::make('galleries.main')->with('galleries', $galleries);
}

/**
*
*/
public function showThisGalleryById($input) {
	$gallery = Gallery::find($input);
	$items = Gallery::find($input)->items;
	$id = $gallery->id;
	$this->layout->content = View::make('galleries.thisGallery')->with('id', $id)
															 	->with('gallery', $gallery)
															 	->with('items',$items);
}

/**
*
*/
public function showThisGalleryByName($input) {
	$gallery = Gallery::where('name','=', $input)->get();
	$id = $gallery->id;
	$this->layout->content = View::make('galleries.thisGallery')->with('id', $id)
															 	->with('gallery', $gallery);
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