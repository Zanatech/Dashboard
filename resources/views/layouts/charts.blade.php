@if(isset($charts) and !is_null($charts))	
	@foreach($charts as $chart)
	<div class="col xl3 l4 m6 s12">
    	<div class="card-panel">
        	<div class="card-content">

        		{!! $chart->render() !!}

        	</div>
    	</div>
    </div>
    @endforeach
@endif	 