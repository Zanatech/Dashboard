@extends('layouts.page')

@section('content')

<section>
	<div class="row">
		@include('dashboard.table.clients')
		@include('layouts.charts')
	</div>
</section>

@endsection