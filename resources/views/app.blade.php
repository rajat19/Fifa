<!DOCTYPE html>
<html>
	<head>
		@include('includes.header')	
	</head>
	<body class="backcover">
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