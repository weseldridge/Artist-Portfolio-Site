@extends('layouts.master')

@section('content')

<div class="row"> 
	<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'register', 'class'=>'form-signup', 'role'=>'form')) }}
			<h2 class="form-signup-heading">Please Register</h2>

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>

			<div class="form-group">
			    <label for="name">Name</label>
			    {{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter Your Name')) }}
		  	</div>
		  	<div class="form-group">
			    <label for="email">Email</label>
			    {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Your Email Address')) }}
		  	</div>
		  	<div class="form-group">
			    <label for="password">Password</label>
			    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		  	</div>
			<div class="form-group">
			    <label for="password_confirmation">Confirm Password</label>
			    {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
		  	</div>
			
			{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>


@stop