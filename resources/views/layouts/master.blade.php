	<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>
			@yield('title_prefix', config('master.title_prefix'))
			@yield('title', config('master.title'))
			@yield('title_postfix', config('master.title_postfix'))
		</title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- Materialize v0.100.1 -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">

		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Custom Materialize CSS-->
		<link href="asset{{ 'css/style.css' }}" type="text/css" rel="stylesheet" media="screen,projection"/>

		@if(config('master.plugins.datatables'))
	        <!-- DataTables -->
	        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    	@endif

    	@yield('Custom_CSS')

    	<!-- Charts assets load  -->
    	{!! Charts::assets() !!}

    	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>

	<body>

		<div class="row">
			@yield('body')
		</div>

		<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
        <script src="{{ asset('js/materialize.js') }}"></script>
        <script src="{{ asset('js/init.js') }}"></script>
		@if(config('adminlte.plugins.datatables'))
		    <!-- DataTables -->
		    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
		@endif	
		@yield('Custom_JS')
	</body>
</html>