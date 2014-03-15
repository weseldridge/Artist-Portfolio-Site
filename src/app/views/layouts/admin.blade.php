<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
	<title>Admin</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.1/pure-min.css">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/admin.css') }}" />
</head>
<body>
	<div id="layout" class="content pure-g-r">
		<div id="nav" class="pure-u">
			<div class="nav-inner">
				<div class="pure-menu pure-menu-open">
					<ul>
						<li>{{ HTML::link('inbox', 'Inbox') }}</li>
						<li>{{ HTML::link('admin', 'Admin Home') }}</li>
						<li>{{ HTML::link('home', 'Main Site') }}</li>
						<li>{{ HTML::link('logout', 'Log Out') }}</li>
						<li class="pure-menu-heading">Settings</li>
						<li>{{ HTML::link('admin/settings/user', 'User') }}</li>
						<li>{{ HTML::link('admin/settings/site', 'Site') }}</li>
						<li class="pure-menu-heading">Add New</li>
						<li>{{ HTML::link('group/add', 'Group') }}</li>
						<li>{{ HTML::link('gallery/add', 'Gallery') }}</li>
						<li>{{ HTML::link('item/add', 'Item') }}</li>
						<li>{{ HTML::link('url/add', 'URL') }}</li>
						<li class="pure-menu-heading">Edit</li>
						<li>{{ HTML::link('group/all', 'Group') }}</li>
						<li>{{ HTML::link('gallery/all', 'Gallery') }}</li>
						<li>{{ HTML::link('item/all', 'Item') }}</li>
						<li>{{ HTML::link('url/all', 'URL') }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="content">
			@yield('content')
		</div>
	</div>

</body>
</html>