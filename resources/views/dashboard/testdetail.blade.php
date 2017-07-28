@extends('layouts.page')

@section('content')

<section>
	<div class="row">
		<div class="col s12 m12">
		@if(null !== $test || null !== $columns || null !== $datas)
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
			          <tr>
			          		<th>Test Nro.</th>
		              		<th>Insulation tested</th>
		              		<th>Test mode</th>
		              		<th>HV</th>
		              		<th>Red</th>
		              		<th>Blue</th>
		              		<th>Gnd</th>
		              		<th>Test kV</th>
		              		<th>Capacitance C (pF)</th>
		              		<th>Measured</th>
		              		<th>@20°C</th>
		              		<th>Corr Factor</th>
		              		<th>mA</th>
		              		<th>Watts</th>
		              		<th>IR</th>
			          </tr>
			        </thead>

			        <tbody>
	              		@foreach($datas as $data)
	              			<tr>
	              				<td>{{ $i++ }}</td>
	              				<td>{{ $data->insultest }}</td>
	              				<td>{{ $data->textmodetxt }}</td>
	              				<td>{{ $data->overalleng }}</td>
	              				<td>{{ $data->overallgnd }}</td>
	              				<td>{{ $data->overallgar }}</td>
	              				<td>{{ $data->overallust }}</td>
	              				<td>{{ $data->kv }}</td>
	              				<td>{{ $data->cap }}</td>
	              				<td>{{ $data->pf }}</td>
	              				<td>{{ $data->pf_20 }}</td>
	              				<td>{{ $data->corr }}</td>
	              				<td>{{ $data->ma }}</td>
	              				<td>{{ $data->watts }}</td>
	              				<td>{{ $data->rating }}</td>
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