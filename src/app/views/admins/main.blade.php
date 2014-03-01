@extends('layouts.master')

@section('content')
<div class="row">
	<div class="col-md-4">
		<h2>Create New Resources!</h2>
		<ul>
			<li>{{ HTML::link('group/add', 'Add a Group') }}</li>
			<li>{{ HTML::link('gallery/add', 'Add a Gallery') }}</li>
			<li>{{ HTML::link('item/add', 'Add a Page') }}</li>
		</ul>
	</div>
</div>
@stop