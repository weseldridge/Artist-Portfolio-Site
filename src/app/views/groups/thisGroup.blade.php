@extends('layouts.master')

@section('content')
	<h1>{{ $group->name }} Group</h1>
	<p>{{ $group->description }}</p>

	@if($galleries)
	<ul>
	@foreach($galleries as $gallery)
	<li>
		<ul>
			<li>name: {{ $gallery->name }} </li>
			<li>description: {{ $gallery->description }} </li>
		</ul>
	</li>
	@endforeach
	</ul>
	@endif
	
@stop