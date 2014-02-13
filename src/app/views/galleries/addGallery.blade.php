@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'gallery/add', 'class'=>'form-signup', 'role'=>'form')) }}
		<h2 class="form-signup-heading">Add Gallery</h2>

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>

		<div class="form-group">
			<label for="name">Gallery Name</label>
			{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Name')) }}
		</div>
		<div class="form-group">
			<label for="description">Gallery Description</label>
			{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Description')) }}
		</div>
		<div class="form-group">
			<label for="price">Image</label>
			{{ Form::file('img') }}
		</div>

		{{ Form::submit('Add Gallery', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>

@stop