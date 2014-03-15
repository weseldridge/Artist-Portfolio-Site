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
						<li><a href="#">Inbox</a></li>
						<li><a href="#">Admin Home</a></li>
						<li><a href="#">Main Site</a></li>
						<li><a href="#">Logout</a></li>
						<li class="pure-menu-heading">Settings</li>
						<li><a href="#">Account</a></li>
						<li><a href="#">Users</a></li>
						<li><a href="#">Site</a></li>
						<li class="pure-menu-heading">Add New</li>
						<li>{{ HTML::link('group/add', 'Group') }}</li>
						<li>{{ HTML::link('gallery/add', 'Gallery') }}</li>
						<li>{{ HTML::link('item/add', 'Item') }}</li>
						<li class="pure-menu-heading">Edit</li>
						<li>{{ HTML::link('group/all', 'Group') }}</li>
						<li>{{ HTML::link('gallery/all', 'Gallery') }}</li>
						<li>{{ HTML::link('item/all', 'Item') }}</li>
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