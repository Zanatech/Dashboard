@extends('layouts.page')

@section('content')

<section>
	<div class="row">
		@include('dashboard.table.assets')
		@include('dashboard.table.jobs')
		@include('layouts.charts')
	</div>
</section>

@endsection