@if (isset($charts) and !is_null($charts))
	<section>
		<div class="row">
			<div class="card col m12 s12">
				<div class="card-panel">
					@foreach ($charts as $chart)
						<div class="col {{ $chart['size'] }}">
							{!! $chart['chart']->render() !!}
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endif