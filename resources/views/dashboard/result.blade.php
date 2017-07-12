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
			        	<?php
			        		foreach ($tests as $test) {
			        			echo "<tr>";
			        			echo "<td> $test->id </td>";
			        			echo "<td> $test->name </td>";
			        			echo "<td> $test->created_at </td>";
			        			echo "<td><a>See all</a></td>";
			        			echo "</tr>";
			        		};
			        	?>
			        </tbody>
			      </table>

	            </div>
	        </div>
		@endif
	    </div>
	</div>
</section>

@endsection