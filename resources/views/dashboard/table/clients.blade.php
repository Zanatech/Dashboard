@if(isset($clients) and !is_null($clients))
	<div class="col s12 m12">
		<div class="card-panel">
			<div class="card-content">

				<!-- Table -->
				<table class="responsive-table">

					<!-- Headers -->
					<thead>
						<tr>
							<th>{{ trans('dashboard.client_id') }}</th>
							<th>{{ trans('dashboard.client_name') }}</th>
							<th>{{ trans('dashboard.client_created') }}</th>
							@if(!isset($assets))
							<th>{{ trans('dashboard.client_asset') }}</th>
							@endif
						</tr>
					</thead>

					<!-- DATA -->
					<tbody>
						@foreach ($clients as $client)
							<tr>
								<td> {{ $client->id }} </td>
								<td> {{ $client->name }} </td>
								<td> {{ $client->created_at }} </td>
								@if(!isset($assets))
								<td><a href="/client/{{ $client->id }}">{{ trans('dashboard.see_all') }}</a></td>
								@endif
							</tr>
						@endforeach
					</tbody>
					
				</table>

			</div>
		</div>
	</div>
@endif