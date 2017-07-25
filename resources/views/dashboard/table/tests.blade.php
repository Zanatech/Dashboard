@if(null !== $tests)
<div class="col s12 m12">
	<div class="hide">{{ $i = 1}}</div>
	<div class="card-panel">
		<div class="card-content">

			<span class="card-title"></span>

			<table class="responsive-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Test Group</th>
						<th>Test Status</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Details</th>
					</tr>
				</thead>

				<tbody>
				@foreach ($tests as $test)
					<tr>
						<td> {{ $i++ }} </td>
						<td> {{ $test->test_group }} </td>
						<td> {{ $test->test_status }} </td>
						<td> {{ $test->created_at }} </td>
						<td> {{ $test->updated_at }} </td>
						<td><a href="#">See all</a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endif 