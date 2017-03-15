<!DOCTYPE html>
<html>
	<head>
		@include('includes.header')	
	</head>
	@if(Auth::guest())
	<body class="backcover1 scrollbar" id="style-13">
	@else
	<body class="backcover2 scrollbar" id="style-8">
	@endif
		<div class="spinner-wrapper">
		    <div class="spinner2"></div>
		</div>
		<?php $g_color = 'red'; ?>
		@include('includes.nav')
		@yield('content')
		@include('includes.footer')
		@yield('javascripts')
	</body>
</html>