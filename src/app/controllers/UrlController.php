<?php

class UrlController extends BaseController {

	protected $layout = 'layouts.admin';

	/*
	* ----------------------------------------------------------------------------
	*							GET METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function showAllURL()
	{
		$urls = CustUrl::all();
		$this->layout->content = View::make('urls.allUrls')->with('title','All URLs')
															->with('urls', $urls);
	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function showEditThisURL($id)
	{
		$url = CustUrl::find($id);
		$this->layout->content = View::make('urls.thisUrl')->with('title','Edit this URL')
														   ->with('url', $url);
	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function showAddURL()
	{
		$this->layout->content = View::make('urls.addUrl')->with('title','Add a New URL');
	}


	/**
	*
	*
	* @param void
	* @return void
	*/
	public function doToggleURL($id)
	{
		$url = CustUrl::find($id);
		if($url->is_active){
			$url->is_active = 0;
		} else {
			$url->is_active = 1;
		}
		$url->save();

		return Redirect::to('url/all');
	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function doDeleteURL($id)
	{
		$url = CustUrl::find($id);
		$url->delete();
		return Redirect::to('url/all');
	}

	/*
	* ----------------------------------------------------------------------------
	*							POST METHODS
	* ----------------------------------------------------------------------------
	*/

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function doAddURL()
	{
		$rules = array(
				'name' 			=> 'required|min:3|max:49',
				'url'	=> 'min:3|max:255',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('url')->with('message', 'The following errors occurred: ')
															  ->withErrors($validator)
																->withInput();
		} else {
				$url = new CustUrl;
				$url->name = Input::get('name');
				$url->url = Input::get('url');
				$url->save();

				return Redirect::to('url')->with('message', 'Url successfully added.')
												->with('title', 'All Urls');
		}
	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function doEditThisURL($id)
	{
		$rules = array(
				'name' => 'required|min:3|max:49',
				'url'	=> 'min:3|max:255',
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('url/edit/' . $id)->with('message', 'The following errors occurred: ')
																->withErrors($validator)
																->withInput();
		} else {
				$url = CustUrl::find($id);
				$url->name = Input::get('name');
				$url->url = Input::get('url');
				$url->save();

				return Redirect::to('url')->with('message', 'Url successfully added.')
												->with('title', 'All Urls');
		}
	}





}
