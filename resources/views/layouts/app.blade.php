<!DOCTYPE html>
<html lang="ja">
<head>
	@yield('head')
</head>
<body>
<div id="app">
	@yield('header')
	@yield('content')
	@yield('footer')
</div>
<script type="text/javascript" src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>