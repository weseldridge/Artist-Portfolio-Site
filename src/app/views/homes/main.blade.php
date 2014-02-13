@extends('layouts.master')

@section('content')
	<ul>
		<li><h2><strong>User</strong></h2></li>
		<li>{{ HTML::link('login', 'Login Page') }}</li>
		<li>{{ HTML::link('logout', 'Logout Page') }}</li>
		<li>{{ HTML::link('register', 'Register Page') }}</li>
		<li><h2><strong>Gallery</strong></h2></li>
		<li>{{ HTML::link('gallery', 'Show all galleries') }}</li>
		<li>{{ HTML::link('gallery/1', 'Show gallery with id 1') }}</li>
		<li>{{ HTML::link('gallery/main', 'Show gallery with name main') }}</li>
		<li>{{ HTML::link('gallery/add', 'Add gallery page') }}</li>
		<li>{{ HTML::link('gallery/edit/1', 'Edit gallery with id 1') }}</li>
		<li><h2><strong>Item</strong></h2></li>
		<li>{{ HTML::link('item', 'Show all items') }}</li>
		<li>{{ HTML::link('item/1', 'Show itme with id 1') }}</li>
		<li>{{ HTML::link('item/edit/1', 'edit item with id 1') }}</li>
		<li>{{ HTML::link('item/add', 'add item page') }}</li>
		<li><h2><strong>Group</strong></h2></li>
		<li>{{ HTML::link('group', 'Show all groups') }}</li>
		<li>{{ HTML::link('group/1', 'Show group with id 1') }}</li>
		<li>{{ HTML::link('group/main', 'Show group with name main') }}</li>
		<li>{{ HTML::link('group/edit/1', 'Edit group with id 1') }}</li>
		<li>{{ HTML::link('group/add', 'Add a group') }}</li>
</div>
	
@stop