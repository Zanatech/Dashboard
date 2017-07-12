@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $clients)
			        <div class="card-panel">
	            <div class="card-content">
	              
	              <span class="card-title"></span>

	              <table class="responsive-table">
			        <thead>
			          <tr>
			              <th>Id</th>
			              <th>Name</th>
			              <th>Created at</th>
			              <th>Assets</th>
			          </tr>
			        </thead>

			        <tbody>
			        	@foreach ($clients as $client)
			        		<tr>
			        			<td> {{ $client->id }} </td>
			        			<td> {{ $client->name }} </td>
			        			<td> {{ $client->created_at }} </td>
			        			<td><a href="client/{{ $client->id }}">See all</a></td>
			        		</tr>
			        	@endforeach
			        </tbody>
			      </table>

	            </div>
	        </div>
		@endif
	    </div>
	</div>
</section>

@endsection