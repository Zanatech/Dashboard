@extends('layouts.app')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $test || null !== $columns || null !== $datas)

			<div class="card-panel">
	            <div class="card-content">
	              
	              <span class="card-title"></span>

	              <table class="responsive-table">
			        <thead>
			          <tr>
			              <th>Id</th>
			              <th>Name</th>
			              <th>Created at</th>
			          </tr>
			        </thead>
			        <tbody>
			        	<tr>
			        		<td> {{ $test->id }} </td>
			        		<td> {{ $test->name }} </td>
			        		<td> {{ $test->created_at }} </td>
			        	</tr>
			        </tbody>
			      </table>
	            </div>
	        </div>

	        <div class="card-panel">
	            <div class="card-content">
	              
	              <span class="card-title"></span>

	              <table class="responsive-table">
	              	<thead>
	              		@foreach($columns as $column)
	              			<th>{{ $column->Field }}</th>
	              		@endforeach
	              	</thead>
	              	<tbody>
	              		@foreach($datas as $data)
	              			<tr>
	              				@foreach($data as $key => $value)
	              					<td> {{ $value }} </td>
	              				@endforeach
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