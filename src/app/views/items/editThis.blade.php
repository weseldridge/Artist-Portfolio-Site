@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		{{ Form::open(array('url'=>'item/edit', 'class'=>'form-signup', 'role'=>'form')) }}
		<h2 class="form-signup-heading">End item</h2>

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
			<label for="date">Completion Date</label>
			{{ Form::text('date', null, array('class'=>'form-control', 'placeholder'=>'Enter Creation Date')) }}
		</div>

		{{ Form::submit('Update Item', array('class'=>'btn btn-large btn-primary btn-block'))}}
		{{ Form::close() }}
	</div>
</div>
@stop