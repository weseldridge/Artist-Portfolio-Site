@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		{{ Form::open(array('url'=>'gallery/add', 'class'=>'pure-form pure-form-aligned', 'role'=>'form')) }}

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="pure-group">
			{{ Form::text('name', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Gallery Name')) }}

			{{ Form::text('description', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Gallery Description')) }}
		</div>
		{{--<div class="form-group">
			<label for="price">Image</label>
			{{ Form::file('img') }}
		</div>--}}
		<div class="pure-u-1 pure-u-med-1-3 form-undefined">
			<label for="">Belongs to Group: </label>
			<select name="group_id">
				<option value="1">None</option>
				@if($groups)
					@foreach($groups as $group)
						<option value="{{ $group->id }}"> {{ $group->name }}</option>
					@endforeach
				@endif
			</select>
		</div>

		<span class="content-form-submit">
			<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Add Gallery</button>
		</span>
		{{ Form::close() }}
	</div>
@stop