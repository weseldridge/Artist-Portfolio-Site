<?php

class EmailController extends BaseController {

protected $layout = 'layouts.master';
/*
* ----------------------------------------------------------------------------
*							GET METHODS
* ----------------------------------------------------------------------------
*/



/*
* ----------------------------------------------------------------------------
*							POST METHODS
* ----------------------------------------------------------------------------
*/

  /**
  *
  */
  public function doAddEmail() {

    $rules = array(
        'name' 			=> 'required|min:3|max:57',
        'email'	=> 'required|email|min:6|max:100',
        'url'	=> 'url|min:5|max:255',
        'topic'	=> 'required|min:3|max:50',
        'message'	=> 'required|min:3|max:500'
      );

    // run the validation rules on the inputs from the form
    $validator = Validator::make(Input::all(), $rules);

    // if the validator fails, redirect back to the form
    if ($validator->fails()) {
      return Redirect::to('inbox/test')->with('message', 'The following errors occurred: ')
                                      ->withErrors($validator)
                                      ->withInput()->with('Title', 'Test Message');
    } else {
      $message = new Inbox;
      $message->name = Input::get('name');
      $message->email = Input::get('email');
      $message->url = Input::get('url');
      $message->topic = Input::get('topic');
      $message->message = Input::get('message');
      $message->save();

      return Redirect::to('inbox')->with('message', 'Group successfully added.')
                                  ->with('title', 'Inbox');
    }
  }

/*
* ----------------------------------------------------------------------------
*							HELPER METHODS
* ----------------------------------------------------------------------------
*/

}
