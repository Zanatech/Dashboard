@if(isset($clients))
@if(null !== $clients)
	<div class="col s12 m12">
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
								@if(!isset($assets))
								<th>Assets</th>
								@endif
							</tr>
						</thead>

						<tbody>
						@foreach ($clients as $client)
							<tr>
								<td> {{ $client->id }} </td>
								<td> {{ $client->name }} </td>
								<td> {{ $client->created_at }} </td>
								@if(!isset($assets))
								<td><a href="/client/{{ $client->id }}">See all</a></td>
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
	    