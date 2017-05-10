<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	// function draw chart
    function drawChart() {
		var data = google.visualization.arrayToDataTable([<?php echo $dataArr; ?>]);   
		var options = {
			title: '<?php echo $graphTitle;?>',
            vAxis: {direction: -1, viewWindow: {min: <?php echo $minValue?>, max: <?php echo $maxValue; ?>}},
			legend: { position: 'bottom' }
		};

		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
		chart.draw(data, options);
	}
</script>
<div id="curve_chart" style="width: 900px; height: 500px"></div>