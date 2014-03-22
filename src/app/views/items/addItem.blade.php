@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			<div class="pure-u-1-3 form-text">
				<h3>Item Name</h3>
				<p>
					The item name helps to id the item, and will also be used for the
					alternative text if the image breaks;
				</p>
				<h3>Item Description</h3>
				<p>
					The description will be used as the caption for the item.
				</p>
				<h3>Item Files</h3>
				<p>
					Choose a file. Supports all types of images. Keep image size less than
					1024x768 pixels.
				</p>
				<h3>Item Belongs to</h3>
				<p>
					Items belong to galleries. You will have to choose who it belongs too.
				</p>
			</div>
			{{ Form::open(array('url'=>'item/add', 'class'=>'pure-u-1-3 pure-form pure-form-aligned', 'role'=>'form', 'files' => true)) }}

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>

			<div class="pure-group">
				{{ Form::text('name', null, array('class'=>'pure-input-1', 'placeholder'=>'Item Name')) }}

				{{ Form::text('description', null, array('class'=>'pure-input-1', 'placeholder'=>'Item Description')) }}

				{{ Form::text('price', null, array('class'=>'pure-input-1', 'placeholder'=>'price')) }}
			</div>
			<div class="pure-u-1 pure-u-med-1 form-undefined">
				{{ Form::file('file') }}
			</div>

			<div class="pure-u-1 pure-u-med-1 form-undefined">
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
				<button type="submit" class="pure-button pure-input-1 pure-button-primary">Add Item</button>
			</span>
			{{ Form::close() }}
		</div>
	</div>
@stop
