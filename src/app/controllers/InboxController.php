<?php

class InboxController extends BaseController {

	protected $layout = 'layouts.admin';


	public function showInbox()
	{
		$this->layout->content = View::make('inboxes.main')->with('title','Inbox');
	}

}