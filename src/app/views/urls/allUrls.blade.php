@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		@if(!$urls)
			<div class="content-empty">
				<h1>You have not created any URLs</h1>
			</div>
		@else
			<span class="content-body-table">
				<table class="pure-table">
				    <thead>
				        <tr>
				            <th>Name</th>
				            <th>Address</th>
				            <th>On/Off</th>
				            <th>Remove</th>
				        </tr>
				    </thead>

				    <tbody>
				    	@foreach($urls as $url)
					        <tr>
					        	
					        	<td>{{ HTML::link('url/edit/' . $url->id, $url->name) }}</td>
					        	<td>{{ $url->url }}</td>
					        	<td>{{ $url->is_active }}</td>
					        	<td>X</td>
					        </tr>
				        @endforeach
				    </tbody>
				</table>
			</span>

		@endif
	</div>
@stop