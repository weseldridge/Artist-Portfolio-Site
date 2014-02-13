<?php

class UserController extends BaseController {

	protected $layout = 'layouts.master';


	public function showLogin(){
		$this->layout->content = View::make('users.login');
	}

	public function doLogin(){
		// validate the info, create rules for the inputs
		$rules = array(
			'email'    => 'required|email',
			'password' => 'required|alphaNum|min:3'
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('login')
				->withErrors($validator) 
				->withInput(Input::except('password'));
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				echo 'SUCCESS!';

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login');

			}
		}
	}

	public function showRegister(){
		$this->layout->content = View::make('users.register');
	}

	public function doRegister(){
		$rules = array(
			'name' 					=> 'required|min:3',
			'email'    				=> 'required|email',
			'password' 				=> 'required|alphaNum|between:6,15|confirmed',
			'password_confirmation'	=> 'required|alpha_num|between:6,12',
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		} else {
			$user = new User;
		    $user->name = Input::get('name');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->create();

		    return Redirect::to('users/login')->with('message', 'Thanks for registering!');
		}
	}

	public function doLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}

}