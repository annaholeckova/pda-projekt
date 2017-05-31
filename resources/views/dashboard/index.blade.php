@extends('layout')

@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-6">
            <canvas id="agencies" width="200" height="200"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="categories" width="200" height="200"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <canvas id="pay" width="200" height="200"></canvas>
        </div>
        <div class="col-md-6">
            {{--<canvas id="categories" width="400" height="400"></canvas>--}}
        </div>
    </div>





<script>
    var agencies = {!! $agencies !!}
    var agenciesName = [];
    var agencyData = [];

    for (var agency in agencies) {
		agenciesName.push(agencies[agency].name);
		agencyData.push(agencies[agency].works.length)
	}

	var ctx = document.getElementById("agencies").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: agenciesName,
			datasets: [{
				label: 'Agentúry s najväčším počtom brigád',
				data: agencyData,
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
    <script>
		var categories = {!! $categories !!}
		var categoriesName = [];
		var categoriesData = [];

		for (var category in categories) {
			categoriesName.push(categories[category].name);
			categoriesData.push(categories[category].works.length)
		}

		var ctx = document.getElementById("categories").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: categoriesName,
				datasets: [{
					label: 'Kategórie s najväčším počtom brigád',
					data: categoriesData,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
    </script>
    <script>
		var pay = {!! $pay !!}
		var payName = [];
		var payData = [];

		for (var payItem in pay) {

			payName.push(pay[payItem].month);
			payData.push(pay[payItem].pay.toFixed(2));
		}

		var ctx = document.getElementById("pay").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: payName,
				datasets: [{
					label: 'Priemerne platy brigad za jednotlive mesiace',
					data: payData,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
    </script>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>