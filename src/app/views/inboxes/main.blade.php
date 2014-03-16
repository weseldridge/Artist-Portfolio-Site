@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			{{ HTML::link('inbox/test', 'Test Message', array('class'=>'pure-button')) }}
			@if(isset($messages) && count($messages) > 0)
				<table class="pure-table pure-table-horizontal table-hover">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Topic</th>
			            <th>Message</th>
			            <th>Date</th>
			        </tr>
			    </thead>

			    <tbody class="clickable">
						@foreach($messages as $message)
			        <tr href="{{ URL::to('inbox/message/' . $message->id)}}"
								@if($message->has_read)
									class=""
								@else
									class="not-read"
								@endif
								>
			            <td >{{ $message->name }}</td>
									<td>{{ $message->topic }}</td>
									<td>{{ $message->message }}</td>
									<td>{{ $message->created_at }}</td>
			        </tr>
						@endforeach
			    </tbody>
			</table>
			@else
				<h1>You do not have any messages...</h1>
			@endif
		</div>
	</div>
@stop
