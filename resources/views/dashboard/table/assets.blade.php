@if(isset($assets) && !is_null($assets))
	<div class="col s12 m12">
		<div class="card-panel">
			<div class="card-content">
			
				<!-- Table -->
				<table class="responsive-table">

					<!-- Headers -->
					<thead>
						<tr>
							<th>{{ trans('dashboard.asset_id') }}</th>
							<th>{{ trans('dashboard.asset_plant') }}</th>
							<th>{{ trans('dashboard.asset_substation') }}</th>
							<th>{{ trans('dashboard.asset_eq') }}</th>
							<th>{{ trans('dashboard.asset_name') }}</th>
							<th>{{ trans('dashboard.asset_created_at') }}</th>
							<th>{{ trans('dashboard.asset_updated_at') }}</th>
							@if(!isset($jobs))
							<th>{{ trans('dashboard.asset_jobs') }}</th>
							@endif
						</tr>
					</thead>

					<!-- DATA -->
					<tbody>
						@foreach ($assets as $asset)
							<tr>
								<td> {{ $asset->id }} </td>
								<td> {{ $asset->plant }} </td>
								<td> {{ $asset->substation }} </td>
								<td> {{ $asset->eq_type }} </td>
								<td> {{ $asset->asset_name }} </td>
								<td> {{ $asset->created_at }} </td>
								<td> {{ $asset->updated_at }} </td>
								@if(!isset($jobs))
								<td><a href="/asset/{{ $asset->id }}">{{ trans('dashboard.see_all') }}</a></td>
								@endif
							</tr>
						@endforeach
					</tbody>
					
				</table>

			</div>
		</div>
	</div>
@endif
