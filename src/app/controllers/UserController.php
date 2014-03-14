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
				$user = User::where('email','=',$userdata['email'])->firstOrFail();
				Session::put('email', $userdata['email']);
				Session::put('role', $user->role);
				return Redirect::to('/')->with('msg', 'Successful logged in!');

			} else {	 	

				// validation not successful, send back to form	
				return Redirect::to('login')->with('msg','email or password is incorect');

			}
		}
	}

	public function showRegister(){
		$this->layout->content = View::make('users.register');
	}

	public function doRegister(){
		$rules = array(
			'name' 					=> 'required|min:3',
			'email'    				=> 'required|email|unique:users',
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
		    $user->name = Input::get('email');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

		    return Redirect::to('login')->with('message', 'Thanks for registering!');
		}
	}

	public function doLogout() {
		Session::forget('email');
		Session::forget('role');
		Auth::logout();
		return Redirect::route('login')->with('message', 'Your are now logged out!');
	}

}