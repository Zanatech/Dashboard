@if(isset($tests) && !is_null($tests))
	<div class="col s12 m12">
		<div class="card-panel">
			<div class="card-content">

				<!-- Table -->
				<table class="responsive-table">

					<!-- Headers -->
					<thead>
						<tr>
							<th>{{ trans('dashboard.test_id') }}</th>
							<th>{{ trans('dashboard.test_group') }}</th>
							<th>{{ trans('dashboard.status') }}</th>
							<th>{{ trans('dashboard.test_created_at') }}</th>
							<th>{{ trans('dashboard.test_updated_at') }}</th>
							<th>{{ trans('dashbaord.test_details') }}</th>
						</tr>
					</thead>

					<!-- DATA -->
					<tbody>
						@foreach ($tests as $test)
							<tr>
								<td> {{ $test->id }} </td>
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
