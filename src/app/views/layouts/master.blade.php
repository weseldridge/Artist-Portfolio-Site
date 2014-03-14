<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
	<title>untitled</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}" />
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
	<!-- <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" /> -->
	<link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
</head>
<body>
	{{-- <nav>
		<ul>
			<li>{{ HTML::link('/', 'Home') }}</li>
			@foreach($groups as $group)
				<li>{{ HTML::link('group/' . $group['id'], $group['name']) }}</li>
				<ul>
					@foreach($galleries[$group['id']] as $gallery)
						<li>{{ HTML::link('gallery/' . $gallery['id'], $gallery['name']) }}</li>
					@endforeach	
				</ul>
			@endforeach
			@foreach($custlinks as $custlink)

			@endforeach
			<li>{{ HTML::link('contact', 'Contact') }}</li>
		</ul>
	</nav> --}}
	<div class="container">
		@yield('content')
	</div>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<!-- <script src="{{ URL::asset('assets/js/vendor/bootstrap.min.js') }}"></script> -->
	<script src="{{ URL::asset('assets/js/vendor/modernizr.js') }}"></script>
</body>
</html>