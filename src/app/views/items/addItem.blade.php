@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		{{ Form::open(array('url'=>'item/add', 'class'=>'pure-form pure-form-aligned', 'role'=>'form', 'files' => true)) }}

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>

		<div class="pure-group">
			{{ Form::text('name', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Item Name')) }}

			{{ Form::text('description', null, array('class'=>'pure-input-1-2', 'placeholder'=>'Item Description')) }}

			{{ Form::text('price', null, array('class'=>'pure-input-1-2', 'placeholder'=>'price')) }}
		</div>
		<div class="pure-u-1 pure-u-med-1-3 form-undefined">
			{{ Form::file('file') }}
		</div>

		<div class="pure-u-1 pure-u-med-1-3 form-undefined">
			<label for="">Belongs to Gallery: </label>
			<select name="gallery_id">
				<option value="0">None</option>
				@if($galleries)
					@foreach($galleries as $gallery)
						<option value="{{ $gallery->id }}"> {{ $gallery->name }}</option>
					@endforeach
				@endif
			</select>
		</div>


		<span>
			<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Add Item</button>
		</span>
		{{ Form::close() }}
	</div>
@stop
