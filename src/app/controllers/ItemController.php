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
	$items = Item::all();
	$this->layout->content = View::make('items.main')->with('items', $items);
}

/**
*
*/
public function showThisItem($id) {
	$item = Item::find($id);
	$this->layout->content = View::make('items.thisItem')->with('id', $id)->with('item', $item);
}

/**
*
*/
public function showEditThisItem($id) {
	$item = Item::find($id);
	$this->layout->content = View::make('items.editThis')->with('id', $id)->with('item', $item);
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


/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}