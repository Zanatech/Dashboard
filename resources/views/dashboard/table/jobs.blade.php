@if(isset($jobs) and !is_null($jobs))
	<div class="col s12 m12">
		<div class="card-panel">
			<div class="card-content">

				<!-- Table -->
				<table class="responsive-table">

					<!-- Headers -->
					<thead>
						<tr>
							<th>{{ trans('dashboard.job_id') }}</th>
							<th>{{ trans('dashboard.job_target_date') }}</th>
							<th>{{ trans('dashboard.job_created_at') }}</th>
							<th>{{ trans('dashboard.job_updated_at') }}</th>
							<th>{{ trans('dashboard.job_due_date') }}</th>
							<th>{{ trans('dashboard.job_complete') }}</th>
							<th>{{ trans('dashboard.job_invoice_sent') }}</th>
							@if(!isset($tests))
							<th>{{ trans('dashboard.show_all') }}</th>
							@endif
						</tr>
					</thead>

					<!-- DATA -->
					<tbody>
						@foreach ($jobs as $job)
							<tr>
								<td> {{ $job->id }} </td>
								<td> {{ $job->target_date }} </td>
								<td> {{ $job->created_at }} </td>
								<td> {{ $job->updated_at }} </td>
								<td> {{ $job->due_date }} </td>
								<td> {{ $job->job_complete }} </td>
								<td> {{ $job->invoice_sent }} </td>
								@if(!isset($tests))
								<td><a href="/job/{{ $job->id }}">{{ trans('dashboard.show_all') }}</a></td>
								@endif
							</tr>
						@endforeach
					</tbody>
					
				</table>

			</div>
		</div>
	</div>
@endif
