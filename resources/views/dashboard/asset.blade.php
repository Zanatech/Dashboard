@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $assets)
		<div class="hide">{{ $i = 1}}</div>
			<div class="card-panel">
	            <div class="card-content">
	              
	              <span class="card-title"></span>

	              <table class="responsive-table">
			        <thead>
			          <tr>
			              <th>Id</th>
			              <th>Name</th>
			              <th>Created at</th>
			              <th>Test</th>
			          </tr>
			        </thead>

			        <tbody>
			        	@foreach ($assets as $asset)
			        		<tr>
			        			<td> {{ $i++ }} </td>
			        			<td> {{ $asset->name }} </td>
			        			<td> {{ $asset->created_at }} </td>
			        			<td><a href="asset/{{ $asset->id }}">See all</a></td>
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