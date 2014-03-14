@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'item/add', 'class'=>'form-signup', 'role'=>'form')) }}
		<h2 class="form-signup-heading">Add a new item</h2>

		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>

		<div class="form-group">
			<label for="name">Item Name</label>
			{{ Form::text('name', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Name')) }}
		</div>
		<div class="form-group">
			<label for="description">Item Description</label>
			{{ Form::text('description', null, array('class'=>'form-control', 'placeholder'=>'Enter Item Description')) }}
		</div>
		<div class="form-group">
			<label for="price">Price</label>
			{{ Form::text('price', null, array('class'=>'form-control', 'placeholder'=>'Enter a price')) }}
		</div>
		<div class="form-group">
			<label for="file">File</label>
			{{ Form::file('file') }}
		</div>

		<div class="form-group">
			<label for="">Belongs to Group: </label>
			<select>
				<option value="0">None</option>
				@foreach($galleries as $gallery)
					<option value="{{ $gallery->id }}"> {{ $gallery->name }}</option>
				@endforeach
			</select>
		</div>



		{{ Form::submit('Add Item', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>

@stop