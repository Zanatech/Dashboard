@if(isset($assets))
@if(null !== $assets)
	<div class="col s12 m12">
		<div class="hide">{{ $i = 1}}</div>
			<div class="card-panel">
				<div class="card-content">

					<span class="card-title"></span>

					<table class="responsive-table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Plant</th>
								<th>Substation</th>
								<th>EQ Type</th>
								<th>Name</th>
								<th>Created at</th>
								<th>Updated at</th>
								@if(!isset($jobs))
								<th>Jobs</th>
								@endif
							</tr>
						</thead>

						<tbody>
						@foreach ($assets as $asset)
							<tr>
								<td> {{ $i++ }} </td>
								<td> {{ $asset->plant }} </td>
								<td> {{ $asset->substation }} </td>
								<td> {{ $asset->eq_type }} </td>
								<td> {{ $asset->asset_name }} </td>
								<td> {{ $asset->created_at }} </td>
								<td> {{ $asset->updated_at }} </td>
								@if(!isset($jobs))
								<td><a href="/asset/{{ $asset->id }}">See all</a></td>
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