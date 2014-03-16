@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			@if(count($urls) < 1)
				<div class="content-empty">
					<h1>You have not created any URLs</h1>
				</div>
			@else
				<span class="content-body-table pure-table-horizontal">
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
											<td>
											<span class="center">
												@if($url->is_active)
													<a class="is-active" href="{{ URL::to('url/toggle/' . $url->id) }}"><i class="fa fa-check-circle-o"></i></a>
												@else
													<a class="is-not-active" href="{{ URL::to('url/toggle/' . $url->id) }}"><i class="fa fa-times-circle-o"></i></a>
												@endif
											</span>
										</td>
										<td><a class="remove" href="{{ URL::to('url/delete/' . $url->id) }}"><i class="fa fa-times-circle-o"></i></a></td>
						        </tr>
					        @endforeach
					    </tbody>
					</table>
				</span>

			@endif
		</div>
	</div>
@stop
