@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'group/add', 'class'=>'form-signup', 'role'=>'form')) }}
		<h2 class="form-signup-heading">Add a new group</h2>

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>

		<div class="form-group">
			<label for="name">Group Name</label>
			{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Name')) }}
		</div>
		<div class="form-group">
			<label for="description">Group Description</label>
			{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Description')) }}
		</div>
		{{-- <div class="form-group">
			<label for="date">File</label>
			{{ Form::file('file') }}
		</div> --}}


		{{ Form::submit('Add Group', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>
@stop