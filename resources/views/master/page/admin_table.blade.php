@extends('master.page')

@section('content')

	<section>
		<div class="row">
			<div class="card-panel">
				<table id="editable">
					<thead>
						<tr>
							@foreach($table['header'] as $header)
								<thead>{{ $header }}</thead>
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>1</td>
							<td>1</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>

@endsection