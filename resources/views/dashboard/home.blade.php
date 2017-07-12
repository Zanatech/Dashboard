@extends('layouts.app')

@section('content')

<!-- Card Section  -->
<section>
	<div class="row">
	    <div class="col s6 m3">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>

	            </div>
	            <div class="card-action">
	              <?php
	            $chart = Charts::create('progressbar', 'progressbarjs')
				    ->values([65,0,100])
				    ->responsive(false)
				    ->height(50)
				    ->width(0);

				echo $chart->render();
	            ?>
	            </div>
	        </div>
	    </div>
	    <div class="col s6 m3">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	                <?php
	            $chart =  Charts::create('percentage', 'justgage')
				    ->title('My nice chart')
				    ->elementLabel('My nice label')
				    ->values([65,0,100])
				    ->responsive(false)
				    ->height(300)
				    ->width(0);

				echo $chart->render();
	            ?>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>
	    <div class="col s6 m3">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>
	    <div class="col s6 m3">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <p>I am a very simple card. I am good at containing small bits of information.
	              I am convenient because I require little markup to use effectively.</p>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>

	    <div class="col s12 m6">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	            <?php
	            $chart = Charts::math('sin(x)', [0, 10], 0.2, 'line', 'highcharts');;

				echo $chart->render();
	            ?>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>

	    <div class="col s12 m6">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	            <?php
	            $chart = Charts::create('pie', 'highcharts')
  						->title('My nice chart')
		  				->labels(['First', 'Second', 'Third'])
					  	->values([5,10,20])
					  	->dimensions(1000,500)
					  	->responsive(true);

				echo $chart->render();
	            ?>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>

	    <div class="col s12 m6">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	            <?php
	            $chart = Charts::create('line', 'highcharts')
						    ->title('My nice chart')
						    ->elementLabel('My nice label')
						    ->labels(['First', 'Second', 'Third'])
						    ->values([5,10,20])
						    ->dimensions(1000,500)
						    ->responsive(true);	

				echo $chart->render();
	            ?>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>

	    <div class="col s12 m6">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	            <span class="card-title">Card Title</span>
	            <?php
	            $chart = Charts::multi('areaspline', 'highcharts')
						    ->title('My nice chart')
						    ->colors(['#ff0000', '#ffffff'])
						    ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
						    ->dataset('John', [3, 4, 3, 5, 4, 10, 12])
						    ->dataset('Jane',  [1, 3, 4, 3, 3, 5, 4]);;

				echo $chart->render();
	            ?>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>

	    <div class="col s12 m12">
	        <div class="card blue-grey darken-1">
	            <div class="card-content white-text">
	              <span class="card-title">Card Title</span>
	              <table class="responsive-table">
			        <thead>
			          <tr>
			              <th>Name</th>
			              <th>Item Name</th>
			              <th>Item Price</th>
			          </tr>
			        </thead>

			        <tbody>
			          <tr>
			            <td>Alvin</td>
			            <td>Eclair</td>
			            <td>$0.87</td>
			          </tr>
			          <tr>
			            <td>Alan</td>
			            <td>Jellybean</td>
			            <td>$3.76</td>
			          </tr>
			          <tr>
			            <td>Jonathan</td>
			            <td>Lollipop</td>
			            <td>$7.00</td>
			          </tr>
			        </tbody>
			      </table>
	            </div>
	            <div class="card-action">
	              <a href="#">This is a link</a>
	              <a href="#">This is a link</a>
	            </div>
	        </div>
	    </div>
	</div>
</section>

@endsection