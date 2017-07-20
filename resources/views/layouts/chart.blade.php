@if(null !== $charts )	
	@foreach($charts as $chart)
	<div class="col s12 m6">
    	<div class="card-panel">
        	<div class="card-content">

        		{!! $chart->render() !!}

        	</div>
    	</div>
    </div>
    @endforeach
@endif	