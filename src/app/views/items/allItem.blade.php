@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		@if(count($items) < 1)
			<div class="content-empty">
				<h1>You have not created any items</h1>
			</div>
		@else
			<span class="content-body-table">
				<table class="pure-table">
				    <thead>
				        <tr>
				            <th>Name</th>
				            <th>Description</th>
				            <th>On/Off</th>
				            <th>Remove</th>
				        </tr>
				    </thead>

				    <tbody>
				    	@foreach($items as $item)
					        <tr>
					        	
					        	<td>{{ HTML::link('item/edit/' . $item->id, $item->name) }}</td>
					        	<td>{{ $item->description }}</td>
					        	<td>{{ $item->is_active }}</td>
					        	<td>X</td>
					        </tr>
				        @endforeach
				    </tbody>
				</table>
			</span>

		@endif

	</div>
@stop