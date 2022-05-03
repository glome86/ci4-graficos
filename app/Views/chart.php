<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codeigniter Google Charts Demo</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">
	<div class="container">
		<h1 class="mt-2 text-muted text-center">Visão Geral</h1>
		<center><a href="<?php base_url() ?>">Atualizar</a></center>
		<div class="bg-white p-4 p-sm-5 my-4 mx-3 shadow-lg rounded-end">
			<div id="GooglePieChart" style="height: 400px; width: 100%"></div>
		</div>
		<div class="bg-white p-4 p-sm-5 my-4 mx-3 shadow-lg rounded-end">
			<div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
		</div>
		<div class="bg-white p-4 p-sm-5 my-4 mx-3 shadow-lg rounded-end">
			<div id="GoogleBarChart" style="height: 400px; width: 100%"></div>
		</div>
		<div class="bg-white p-4 p-sm-5 my-4 mx-3 shadow-lg rounded-end">
			<div id="GoogleColumnChart" style="height: 400px; width: 100%"></div>
		</div>

		<div>
			<p class="mt-2 text-muted text-center">&copy; ACTION 2021-2022</p>
		</div>

	</div>

	<!-- SCRIPTS CHARTS -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

	<script>
		google.charts.load('visualization', "1", {
			packages: ['corechart']
		});

		google.charts.setOnLoadCallback(drawBarChart);

		function drawBarChart() {
			var data = google.visualization.arrayToDataTable([
				['Day', 'Products Count'],
				<?php
				foreach ($products as $row) {
					echo "['" . $row['day'] . "'," . $row['sell'] . "],";
				}
				?>
			]);
			var options = {
				title: 'Gráfico Pizza',
				is3D: false,
			};
			var chart = new google.visualization.PieChart(document.getElementById('GooglePieChart'));
			chart.draw(data, options);
		}
	</script>
	<script>
		google.charts.load('visualization', "1", {
			packages: ['corechart']
		});

		google.charts.setOnLoadCallback(showChart);

		function showChart() {
			var data = google.visualization.arrayToDataTable([
				['Day', 'Products Count'],
				<?php foreach ($products as $row) {
					echo "['" . $row['day'] . "'," . $row['sell'] . "],";
				} ?>
			]);
			var options = {
				title: 'Last week sales',
				isStacked: true
			};
			var chart = new google.visualization.ColumnChart(document.getElementById('GoogleColumnChart'));
			chart.draw(data, options);
		}
	</script>
	<script>
		google.charts.load('visualization', "1", {
			packages: ['corechart']
		});

		// Line Chart
		google.charts.setOnLoadCallback(drawLineChart);

		function drawLineChart() {
			var data = google.visualization.arrayToDataTable([
				['Day', 'Products Count'],
				<?php
				foreach ($products as $row) {
					echo "['" . $row['day'] . "'," . $row['sell'] . "],";
				} ?>
			]);
			var options = {
				title: 'Line chart product sell wise',
				curveType: 'function',
				legend: {
					position: 'top'
				}
			};
			var chart = new google.visualization.LineChart(document.getElementById('GoogleLineChart'));
			chart.draw(data, options);
		}
	</script>
	<script>
		google.charts.load('visualization', "1", {
			packages: ['corechart']
		});

		// Bar Chart
		google.charts.setOnLoadCallback(drawBarChart);

		function drawBarChart() {
			var data = google.visualization.arrayToDataTable([
				['Day', 'Products Count'],
				<?php
				foreach ($products as $row) {
					echo "['" . $row['day'] . "'," . $row['sell'] . "],";
				}
				?>
			]);
			var options = {
				title: 'Bar chart products sell wise',
				is3D: true,
			};
			var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
			chart.draw(data, options);
		}
	</script>
</body>

</html>