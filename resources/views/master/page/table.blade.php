@extends('master.page')

@section('content')

@if(isset($tables) and !is_null($tables))

	<section>
		<div class="row">
		@foreach($tables as $table)


		@if(count($table['content']))
			<div class="col s12 m12">
				<div class="card">

					@if($table['reveal'])
						<!-- Charts -->
						<div class="card-image waves-effect waves-block waves-light">
							@if(isset($table['charts']) and !is_null($table['charts']))	
								@foreach($table['charts'] as $chart)

								@if(isset($chart['size']) and !is_null($chart['size']))
								<div class="{{ 'col '.$chart['size'] }}">
								@else
								<div class="col xl4 l4 m6 s12">
								@endif
							        	<div class="card-content">

							        		{!! $chart['chart']->render() !!}

							        	</div>
							    </div>
							    @endforeach
							@endif	 
						</div>

						<!-- Card Preview Title -->
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">
								{{ trans($table['table_title']) }}
								<i class="material-icons right">more_vert</i>
							</span>
						</div>
					@endif

					<!-- Card Reveal Content -->
					@if($table['reveal'])
					<div class="card-reveal">
					@else
					<div class="card-panel">
					@endif

						<!-- Card Title -->
						<span class="card-title activator">
							{{ trans($table['table_title']) }}
							@if($table['reveal'])
							<i class="material-icons right">close</i>
							@endif
						</span>	

						<!-- Table -->
						@if ($table['main'])
						<table class="datatable responsive-table highlight">
						@else
						<table class="infodata responsive-table highlight">
						@endif

							<!-- Headers -->
							<thead>							
								<tr>
									@foreach(trans('dashboard.'.$table['table_name']) as $column)
										<th>{{ $column }}</th>
									@endforeach
									@if($table['main'])
									<th>{{ trans('dashboard.see_all') }}</th>
									@endif
								</tr>
							</thead>

							<!-- DATA -->
							<tbody>
								@if(isset($table['content']) and !is_null($table['content']))
									@foreach ($table['content'] as $row)
										<tr>

											@foreach($row as $value)
												<td>{{ $value }}</td>
											@endforeach

											@if($table['main'])
												<td>
												@if(is_object($row))
												<a class="btn" href="{{ $table['link'].$row->id }}">
													<i class="material-icons">forward</i>
												</a>
												@else
												<a class="btn" href="{{ $table['link'].$row['id'] }}">
													<i class="material-icons">forward</i>
												</a>
												@endif
												</td>
											@endif

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
