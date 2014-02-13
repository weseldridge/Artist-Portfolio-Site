<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
	<title>untitled</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
</head>
<body>
	<button>{{ HTML::link('/', 'Home') }}</button>
	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/vendor/modernizr.js') }}"></script>
</body>
</html>