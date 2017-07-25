@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		@include('dashboard.table.assets')
		@include('dashboard.table.jobs')
	</div>
</section>

@endsection