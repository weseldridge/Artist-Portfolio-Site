@extends('layouts.master')

@section('content')
<div class="row"> 
	<div class="col-md-4 col-md-offset-1">
		<h2>Not yet registered</h2>
		<p>If you are not registered please follow the link below to our registration process.</p>
		<div>{{ HTML::link('register', 'Register') }}</div>
		<h2>Forgot your password</h2>
		<p>If you do not remember your password the link below will walk you through the prcess.</p>
		<div>{{ HTML::link('users/passrest', 'Forgot Password') }}</div>
	</div>
	<div class="col-md-4 col-md-offset-1">
		{{ Form::open(array('url'=>'users/doLogin', 'class'=>'form-signup', 'role'=>'form')) }}
			<h2 class="form-signup-heading">Please Login</h2>

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>

		  	<div class="form-group">
			    <label for="email">Email</label>
			    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Your Email Address')) }}
		  	</div>
		  	<div class="form-group">
			    <label for="password">Password</label>
			    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		  	</div>
			
			{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>
	
@stop

