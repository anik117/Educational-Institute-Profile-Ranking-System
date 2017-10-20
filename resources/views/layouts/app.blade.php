<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}" />
	<title>EIPRS</title>

	{{-- Font awesome cdn --}}
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	{{-- Compiled css --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
</head>
<body>
	@include('inc.navbar')
	<div class="container">
		@yield('content')
	</div>

	{{-- Compiled JS --}}
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

	{{-- Custom script --}}
	@yield('script')
</body>
</html>