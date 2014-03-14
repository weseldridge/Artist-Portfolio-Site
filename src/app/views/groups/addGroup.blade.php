@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		{{ Form::open(array('url'=>'group/add', 'class'=>'pure-form pure-form-aligned', 'role'=>'form')) }}

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="pure-group">
			{{ Form::text('name', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Group Name')) }}
			{{ Form::text('description', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Group Description')) }}
		</div>
		{{-- <div class="form-group">
			<label for="date">File</label>
			{{ Form::file('file') }}
		</div> --}}


		<span>
			<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Add Group</button>
		</span>
		{{ Form::close() }}
	</div>
@stop