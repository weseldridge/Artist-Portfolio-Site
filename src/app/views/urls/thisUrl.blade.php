@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		{{ Form::model($url, array('url'=>'url/edit/' . $url->id, 'class'=>'pure-form pure-form-aligned', 'role'=>'form')) }}

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="pure-group">
			{{ Form::text('name', null, array('class'=>'pure-input-1-2', 'value' => $url->name)) }}

			{{ Form::text('url', null, array('class'=>'pure-input-1-2', 'value' => $url->url)) }}
		</div>

		<span>
			<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Update Group</button>
		</span>
		{{ Form::close() }}
	</div>
@stop
