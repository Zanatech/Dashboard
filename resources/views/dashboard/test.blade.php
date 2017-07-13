@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $tests)
			<div class="card-panel">
	            <div class="card-content">
	              
	              <span class="card-title"></span>

	              <table class="responsive-table">
			        <thead>
			          <tr>
			              <th>Id</th>
			              <th>Name</th>
			              <th>Created at</th>
			              <th>Details</th>
			          </tr>
			        </thead>

			        <tbody>
			        	@foreach ($tests as $test)
			        		<tr>
			        			<td> {{ $test->id }} </td>
			        			<td> {{ $test->name }} </td>
			        			<td> {{ $test->created_at }} </td>
			        			<td><a href="test/{{ $test->id }}">See all</a></td>
			        		</tr>
			        	@endforeach
			        </tbody>
			      </table>
	            </div>
	        </div>
		@endif
	    </div>
	    @include('layouts.charts')
	</div>
</section>

@endsection