@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title . ' - ' . $item->name}}}</div>
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
				<h3>Item Belongs to</h3>
				<p>
					Items belong to galleries. You will have to choose who it belongs too.
				</p>
			</div>
			{{ Form::model($item, array('url'=>'item/edit/' . $id, 'class'=>'pure-u-1-3 pure-form pure-form-aligned', 'role'=>'form')) }}
			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			<div class="pure-group">
				{{ Form::text('name', null, array('class'=>'pure-input-1', 'value'=> $item->name)) }}

				{{ Form::text('description', null, array('class'=>'pure-input-1', 'value'=> $item->description)) }}

				{{ Form::text('price', null, array('class'=>'pure-input-1', 'value'=> $item->price)) }}
			</div>

			<div class="pure-u-1 pure-u-med-1 form-undefined">
				<label for="">Belongs to Gallery: </label>
				<select name="gallery_id">
					<option value="1">None</option>
					@if($galleries)
						@foreach($galleries as $gallery)
							@if($item->gallery_id == $gallery->id)
								<option value="{{ $gallery->id }}" selected="selected"> {{ $gallery->name }}</option>
							@else
								<option value="{{ $gallery->id }}"> {{ $gallery->name }}</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>

			<span>
				<button type="submit" class="pure-button pure-input-1 pure-button-primary">Update Item</button>
			</span>

			{{ Form::close() }}
	</div>
</div>
@stop
