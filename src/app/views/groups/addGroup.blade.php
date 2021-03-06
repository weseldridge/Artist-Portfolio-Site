@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			<div class="pure-u-1-3 form-text">
				<h3>Group Name</h3>
				<p>
					The group name is used as the top level for drop down menus. If active each
					group will be its own drop down button and is used to group galleries. It required.
				</p>
				<h3>Group Description</h3>
				<p>
					Describes the Group. This will help you identify a group if name of groups are close.
				</p>
			</div>
			{{ Form::open(array('url'=>'group/add', 'class'=>'pure-u-1-3 pure-form pure-form-aligned', 'role'=>'form')) }}

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			<div class="pure-group">
				{{ Form::text('name', null, array('class'=>'pure-input-1', 'placeholder'=>'Group Name')) }}
				{{ Form::text('description', null, array('class'=>'pure-input-1', 'placeholder'=>'Group Description')) }}
			</div>
			<div class="pure-u-1 pure-u-med-1 form-undefined">
				{{ Form::file('file') }}
			</div>

			<span>
				<button type="submit" class="pure-button pure-input-1 pure-button-primary">Add Group</button>
			</span>
			{{ Form::close() }}

		</div>
	</div>
@stop
