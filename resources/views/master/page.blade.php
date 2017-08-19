@extends('master')

@section('Custom_CSS')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
@stop

@section('body')
	
	<!-- Nav bar -->
	@include('partial.header')

	@if(isset($notifications) and !is_null($notifications) and count($notifications))
	  <ul class="collection">
	      @foreach($notifications as $notification)
            <li class="collection-item dismissable">
            	<div>{{ $notification }}</div>
            </li>
	      @endforeach
	  </ul>
	@endif
		
		<!-- Side Nav -->
		<ul id="slide-out" class="side-nav fixed collapsible" data-collapsible="{{ config('user.menu.sidebar_type') }}">

			<!-- Fast profile Information -->
			 <div class="user-view">
			    <div class="background">
			      <img src="{{ asset('img/background.jpg') }}">
			    </div>

			    <a href="#!user"><img class=" white responsive-img circle" src="{{ asset('img/logo.png') }} "></a>
			    <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
			    <a href="#!email"><span class="white-text email">{{  Auth::user()->email }}</span></a>

			    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="white-text email">{{ trans('dashboard.log_out') }}</span>
                </a>
	    	    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
				    {{ csrf_field() }}
			    </form>
		   </div>

		   <!-- Main menu generate -->
			@each('partial.sidebar', config('user.menu.items'), 'item')

		</ul>

		<!-- Body -->
		<div id="container">@yield('content')</div>
	@stop
