@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title . ' - ' . $item->name}}}</div>
	</div>
	<div class="content-body">
		{{ Form::model($item, array('url'=>'item/edit/' . $id, 'class'=>'pure-form pure-form-aligned', 'role'=>'form')) }}


		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="pure-group">
			{{ Form::text('name', null, array('class'=>'pure-input-1-2', 'value'=> $item->name)) }}
		
			{{ Form::text('description', null, array('class'=>'pure-input-1-2', 'value'=> $item->description)) }}
		
			{{ Form::text('price', null, array('class'=>'pure-input-1-2', 'value'=> $item->price)) }}
		</div>

		<div class="pure-u-1 pure-u-med-1-3 form-undefined">
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
			<button type="submit" class="pure-button pure-input-1-2 pure-button-primary">Update Item</button>
		</span>

		{{ Form::close() }}
	</div>
</div>
@stop