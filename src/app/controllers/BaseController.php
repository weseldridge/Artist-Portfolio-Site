<?php

class BaseController extends Controller {
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

	}

	protected function gallerysByGroup()
	{
		$galleries = array();
		$groups = Gallery::all();
		foreach ($groups as $group) {
			$galleries[$group['id']] = Group::find($group['id'])->gallerys;
		}
	}

}