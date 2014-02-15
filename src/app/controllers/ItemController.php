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
* We validate and process the item being updated
*
* @param void
* @return Redirect A redirect to a new page
*/
public function doEditThisItem($id) {

	// validate the info, create rules for the inputs
	$rules = array(
		'name'    => 'required',
		'description' => 'required|',
		);

		// run the validation rules on the inputs from the form
	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		return Redirect::to('item/edit/' . $id)
			->withErrors($validator);
	} else {
		$item = Item::find(Input::get('id'));
		$item->name = Input::get('name');
		$item->description = Input::get('description');
		$item->price = Input::get('price');
		$item->date = Input::get('date');
		$item->save();


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
	}
}


/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

/**
*
*/
private function create_item($input)
{
	$item = Item::create(array(
		'name' => $input['name'],
		'description' => $input['description'],
		'price' => $input['price'],
		'input' => $input['date'],
		));

	return $item;

}


/**
*
*/
private function update_item($input)
{
	$item = Item::find($input['id']);
	$item->name = $input['name'];
	$item->description = $input['description'];
	$item->price = $input['price'];
	$item->date = $input['date'];
	$item->save();
}

}