@if(isset($jobs))
@if(null !== $jobs)
<div class="col s12 m12">
	<div class="hide">{{ $i = 1}}</div>
	<div class="card-panel">
		<div class="card-content">

			<span class="card-title"></span>

			<table class="responsive-table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Target Date</th>
						<th>Created at</th>
						<th>Updated at</th>
						<th>Due date</th>
						<th>Job complete</th>
						<th>Invoice sent</th>
						@if(!isset($tests))
						<th>Show all</th>
						@endif
					</tr>
				</thead>

				<tbody>
				@foreach ($jobs as $job)
					<tr>
						<td> {{ $i++ }} </td>
						<td> {{ $job->target_date }} </td>
						<td> {{ $job->created_at }} </td>
						<td> {{ $job->updated_at }} </td>
						<td> {{ $job->due_at }} </td>
						<td> {{ $job->job_complete }} </td>
						<td> {{ $job->invoice_sent }} </td>
						@if(!isset($tests))
						<td><a href="/job/{{ $job->id }}">See all</a></td>
						@endif
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endif
@endif