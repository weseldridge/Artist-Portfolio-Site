@extends('layouts.master')

@section('content')
	<h1>Galleries main page</h1>

	@foreach ($galleries as $gallery)
		<dl>
			<dt>name:</dt>
			<dd>{{ $gallery->name }}</dd>
			<dt>description:</dt>
			<dd>{{ $gallery->description }}</dd>
		</dl>
	@endforeach
</div>
	
@stop