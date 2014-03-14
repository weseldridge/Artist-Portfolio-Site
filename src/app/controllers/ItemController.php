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