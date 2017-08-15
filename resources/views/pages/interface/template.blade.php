<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>LokMov</title>
</head>
	<link href="{{ url('assets/bootstrap/css/flatbst.css') }}" rel="stylesheet">
	<link href="{{ url('assets/bootstrap/css/my.css') }}" rel="stylesheet">
	<script src="{{ url('assets/js/jquery.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

	<!-- video here -->
<!-- 	<link href="{{ url('video/css/videre.css') }}" rel="stylesheet"> -->
    <!-- <script src="{{ url('video/js/videre.js') }}"></script> -->
 <!--    <link href="{{ url('video/tests/css/app.css') }}" rel="stylesheet"> -->
    @yield('video')
<body style="padding:0px;">
	
	@include('pages.interface.headnav')

	@yield('body')

	@include('pages.interface.footnav')

</body>
</html>