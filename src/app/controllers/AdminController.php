<?php

class AdminController extends BaseController {

	/**
	*
	*/
	public function showAdmin(){;
		$this->layout->content = View::make('admins.main');
	}

	/**
	*
	*/
	public function showAdminUser(){
		$this->layout->content = View::make('admins.user');
	}

	/**
	*
	*/
	public function doAdminUser(){
		
	}

}