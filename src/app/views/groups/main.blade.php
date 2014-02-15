@extends('layouts.master')

@section('content')
	<h1>Groups main page</h1>

	@foreach($groups as $group)
		<dl>
			<dt>Name:</dt>
			<dd>{{ $group->name }}</dd>
			<dt>Description:</dt>
			<dd>{{ $group->description }}</dd>
		</dl>
	@endforeach
	
@stop