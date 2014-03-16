<?php

class InboxController extends BaseController {

	protected $layout = 'layouts.admin';


	public function showInbox()
	{
		$messages = Inbox::all();
		$this->layout->content = View::make('inboxes.main')->with('title','Inbox')
																											 ->with('messages', $messages);
	}

	public function showInboxTest()
	{
		$this->layout->content = View::make('inboxes.test')->with('title','Test Message Form');
	}

	public function showInboxMessage($id)
	{
		$message = Inbox::find($id);
		$message->has_read = 1;
		$message->save();
		$this->layout->content = View::make('inboxes.message')->with('title','Email Message')
																													->with('message', $message);
	}

}
