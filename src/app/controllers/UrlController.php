<?php

class UrlController extends BaseController {

	protected $layout = 'layouts.admin';


	public function showAllURL()
	{
		$this->layout->content = View::make('urls.main')->with('title','All URLs');
	}

	public function showEditThisURL($id)
	{
		$this->layout->content = View::make('urls.thisUrl')->with('title','Edit this URL');
	}

	public function showAddURL()
	{
		$this->layout->content = View::make('urls.addUrl')->with('title','Add a New URL');
	}

}