<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content=""/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name') }}</title>
		<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.1/css/all.css"
					integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link class="favicon" rel="shortcut icon" href="" type="image/vnd.microsoft.icon"/>
		<link class="favicon" rel="icon" href="" type="image/png"/>
		<!-- Scripts -->
		<script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>
	</head>
	<body>
		<div id="app"></div>
	</body>
</html>
