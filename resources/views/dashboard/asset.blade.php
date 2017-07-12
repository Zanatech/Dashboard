@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $assets)
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
			        	<?php
			        		foreach ($assets as $asset) {
			        			echo "<tr>";
			        			echo "<td> $asset->id </td>";
			        			echo "<td> $asset->name </td>";
			        			echo "<td> $asset->created_at </td>";
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