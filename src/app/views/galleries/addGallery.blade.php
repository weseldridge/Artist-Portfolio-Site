@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			<div class="pure-u-1-3 form-text">
				<h3>Gallery Name</h3>
				<p>
					The gallery name will be used as the text for the link to the gallery.
				</p>
				<h3>Gallery Description</h3>
				<p>
					Describes the Gallery. This will help you identify a gallery if names of galleries are close.
				</p>
				<h3>Gallery Belongs to</h3>
				<p>
					The parent to a gallery is a group. This is how urls are grouped on your website.
				</p>
			</div>
			{{ Form::open(array('url'=>'gallery/add', 'class'=>'pure-u-1-3 pure-form pure-form-aligned', 'role'=>'form')) }}

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			<div class="pure-group">
				{{ Form::text('name', null, array('class'=>'pure-input-1', 'placeholder'=>'Gallery Name')) }}

				{{ Form::text('description', null, array('class'=>'pure-input-1', 'placeholder'=>'Gallery Description')) }}
			</div>
			<div class="pure-u-1 pure-u-med-1 form-undefined">
				{{ Form::file('file') }}
			</div>
			<div class="pure-u-1 form-undefined">
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
				<button type="submit" class="pure-button pure-input-1 pure-button-primary">Add Gallery</button>
			</span>
			{{ Form::close() }}
		</div>
	</div>
@stop
