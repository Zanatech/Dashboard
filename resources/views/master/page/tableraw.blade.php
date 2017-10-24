@extends('master.page')

@section('content')

@if(isset($tables) and !is_null($tables))

	<section>
		<div class="row">
		@foreach($tables as $table)


		@if(count($table['content']))
			<div class="col s12 m12">
				<div class="card">

					<!-- Card Reveal Content -->
					<div class="card-panel">

						<!-- Card Title -->
						<span class="card-title activator">
							{{ $table['table_title'] }}
						</span>	

						<!-- Table -->
						<table class="datatable responsive-table highlight">
							<!-- DATA -->
							<tbody>
								@if(isset($table['content']) and !is_null($table['content']))
									@foreach ($table['content'] as $row)
										<tr>
											@foreach($row as $value)
												<td>{{ $value }}</td>
											@endforeach
										</tr>
									@endforeach
								@endif
							</tbody>	

						</table>

					</div>
				</div>
			</div>
		@else
			<div class="col s12 m12">
				<div class="card">
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4" >
						<i class="material-icons">info</i>
						No data was found
						</span>
					</div>
				</div>		
			</div>
		@endif
		@endforeach
		</div>
	</section>

@endif
@endsection
