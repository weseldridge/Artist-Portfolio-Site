<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
	<title>Admin</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.1/pure-min.css">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/admin.css') }}" />
</head>
<body>
	<div id="layout" class="content pure-g">
		<div id="nav" class="pure-u">
			<div class="nav-inner">
				<div class="pure-menu pure-menu-open">
					<ul>
						<li class="pure-menu-heading">Settings</li>
						<li><a href="#">Account</a></li>
						<li><a href="#">Users</a></li>
						<li><a href="#">Site</a></li>
						<li class="pure-menu-heading">Add New</li>
						<li>{{ HTML::link('group/add', 'Group') }}</li>
						<li>{{ HTML::link('gallery/add', 'Gallery') }}</li>
						<li>{{ HTML::link('item/add', 'Item') }}</li>
						<li class="pure-menu-heading">Edit</li>
						<li><a href="#"><span class="side-nav-label-personal"></span>Group</a></li>
						<li><a href="#"><span class="side-nav-label-work"></span>Gallery</a></li>
						<li><a href="#"><span class="side-nav-label-travel"></span>Item</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="main" class="pure-u-1">
		<div class="main-content">
			<div class="main-conent-header pure-g">
				<div class="pure-u-1-2">
					<h1 class="main-content-title">Welcome Home... Admin</h1>
					<p class="main-content-subtile">
						Last login in time .... Today
					</p>
				</div>
				<div class="main-content-controls pure-u-1-2">
					<button class="secondary-button pure-button">Button 1</button>
					<button class="secondary-button pure-button">Button 2</button>
					<button class="secondary-button pure-button">Button 3</button>
				</div>
				<div class="main-content-body">
					@yield('content')
				</div>
			</div>
		</div>
	</div>

</body>
</html>