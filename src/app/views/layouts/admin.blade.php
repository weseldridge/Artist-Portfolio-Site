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
	<div class="container">
		@yield('content')
	</div>

	<script src="http://yui.yahooapis.com/3.14.1/build/yui/yui-min.js"></script>
</body>
</html>