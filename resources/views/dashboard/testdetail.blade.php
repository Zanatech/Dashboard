@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $test)
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
			        </tbody>
			      </table>

	            </div>
	        </div>
		@endif
	    </div>
	</div>
</section>

@endsection