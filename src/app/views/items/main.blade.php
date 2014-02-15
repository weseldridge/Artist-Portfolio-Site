@extends('layouts.master')

@section('content')
	<h1>Items main page</h1>

	@foreach($items as $item)
		<dl>
			<dt>Name:</dt>
			<dd>{{ $item->name }}</dd>
			<dt>Description:</dt>
			<dd>{{ $item->description }}</dd>
			<dt>Price:</dt>
			<dd>{{ $item->price }}</dd>
		</dl>
	@endforeach
	
@stop