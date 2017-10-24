<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>
			@yield('title_prefix', config('user.master.title_prefix'))
			@yield('title', config('user.master.title'))
			@yield('title_postfix', config('user.master.title_postfix'))
		</title>

		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<!-- Materialize v0.100.1 -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/materialize.css') }}">

		<!-- Material Icons -->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<!-- Custom Materialize CSS-->
		<link href="asset{{ 'css/style.css' }}" type="text/css" rel="stylesheet" media="screen,projection"/>

		@if(config('user.master.plugins.datatables'))
	        <!-- DataTables -->
	        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
    	@endif
    	@if(config('user.master.plugins.fullcalendar'))
	        <!-- FullCalendar -->
	        <link rel="stylesheet" href="asset{{ 'css/fullcalendar.min.css' }}">
	        <link rel="stylesheet" href="asset{{ 'css/fullcalendar.print.min.css' }}">
    	@endif

    	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
		<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />

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

		<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
		<script src="{{ asset('js/materialize.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>

        <script src="{{ asset('js/editableTable.js') }}"></script>

		@if(config('user.master.plugins.datatables'))
		    <!-- DataTables -->
		    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
		@endif	

		@if(config('user.master.plugins.fullcalendar'))
		    <!-- FullCalendar -->
		    <script src="asset('js/fullcalendar.min.js') }}"></script>
		@endif

		@if(config('user.master.plugins.picker'))
		    <!-- Picker -->
	        <script src="{{ asset('js/legacy.js') }}"></script>
	        <script src="{{ asset('js/picker.js') }}"></script>
	        <script src="{{ asset('js/picker.date.js') }}"></script>
	        <script src="{{ asset('js/picker.time.js') }}"></script>
		@endif

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
        <script src="{{ asset('js/init.js') }}"></script>
		@yield('Custom_JS')
	</body>
</html>