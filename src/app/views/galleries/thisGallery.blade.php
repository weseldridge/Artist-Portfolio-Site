@extends('layouts.master')

@section('content')
	<h1>{{ $gallery->name }} gallery</h1>
	<p>{{ $gallery->description }}</p>

	<ul>
	@foreach($items as $item)
	<li>
		<ul>
			<li>name: {{ $item->name }} </li>
			<li>description: {{ $item->description }} </li>
		</ul>
	</li>
	@endforeach
	</ul>
@stop