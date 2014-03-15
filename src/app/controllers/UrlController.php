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
		//$urls = Url::all();
		$this->layout->content = View::make('urls.allUrls')->with('title','All URLs')
															->with('urls', false);
	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function showEditThisURL($id)
	{
		$url = Url::find($id);
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
	public function showEditURL($id)
	{
		$this->layout->content = View::make('urls.editUrl')->with('title','Edit This URL');
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

	}

	/**
	*
	*
	* @param void
	* @return void
	*/
	public function doEditThisURL($id)
	{

	}



	

}