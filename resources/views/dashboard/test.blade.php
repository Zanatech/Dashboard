@extends('layouts.page')

@section('content')

<section>
	<div class="row">
		@include('dashboard.table.jobs')
		@include('dashboard.table.tests')
	</div>
</section>

@endsection