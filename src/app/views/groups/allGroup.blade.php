@extends('layouts.admin')

@section('content')
	<div class="content-header">
		<span class="content-header-bar"></span>
		<div class="content-title">{{{ $title }}}</div>
	</div>
	<div class="content-body">
		<div class="inner">
			@if(count($groups) < 1)
				<div class="content-empty">
					<h1>You have not created any groups</h1>
				</div>
			@else
				<span class="content-body-table">
					<table class="pure-table pure-table-horizontal">
					    <thead>
					        <tr>
					            <th>Name</th>
					            <th>Description</th>
					            <th>On/Off</th>
					            <th>Remove</th>
					        </tr>
					    </thead>

					    <tbody>
					    	@foreach($groups as $group)
						        <tr>

						        	<td>{{ HTML::link('group/edit/' . $group->id, $group->name) }}</td>
						        	<td>{{ $group->description }}</td>
											<td>
												<span class="center">
													@if($group->is_active)
														<a class="is-active" href="{{ URL::to('group/toggle/' . $group->id) }}"><i class="fa fa-check-circle-o"></i></a>
													@else
														<a class="is-not-active" href="{{ URL::to('group/toggle/' . $group->id) }}"><i class="fa fa-times-circle-o"></i></a>
													@endif
												</span>
											</td>
											<td><a class="remove" href="{{ URL::to('group/delete/' . $group->id) }}"><i class="fa fa-times-circle-o"></i></a></td>
						        </tr>
					        @endforeach
					    </tbody>
					</table>
				</span>

			@endif
		</div>

	</div>
@stop
