@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		@include('dashboard.table.clients')
	</div>
</section>

@endsection