<!DOCTYPE html>
<html>
<head>
	<?php 
	include('dbconnect.php');

	$sql_motor1 = "SELECT COUNT(nominal_belanja) AS jumlahmotor1 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 15000 AND nominal_belanja <= 50000";
	$sql_motor2 = "SELECT COUNT(nominal_belanja) AS jumlahmotor2 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 50001 AND nominal_belanja <= 100000";
	$sql_motor3 ="SELECT COUNT(nominal_belanja) AS jumlahmotor3 FROM tb_transaksi WHERE jenis_kendaraan = 'Motor' AND nominal_belanja >= 100001 AND nominal_belanja <= 500000";
	$sql_mobil1 = "SELECT COUNT(nominal_belanja) AS jumlahmobil1 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 15000 AND nominal_belanja <= 50000";
	$sql_mobil2 = "SELECT COUNT(nominal_belanja) AS jumlahmobil2 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 50001 AND nominal_belanja <= 100000";
	$sql_mobil3 = "SELECT COUNT(nominal_belanja) AS jumlahmobil3 FROM tb_transaksi WHERE jenis_kendaraan = 'Mobil' AND nominal_belanja >= 100001 AND nominal_belanja <= 500000";

	$result_motor1 = mysqli_query($db,$sql_motor1);
	$result_motor2 = mysqli_query($db,$sql_motor2);
	$result_motor3 = mysqli_query($db,$sql_motor3);
	$result_mobil1 = mysqli_query($db,$sql_mobil1);
	$result_mobil2 = mysqli_query($db,$sql_mobil2);
	$result_mobil3 = mysqli_query($db,$sql_mobil3);


	$data_motor1 = mysqli_fetch_assoc($result_motor1);
	$data_motor2 = mysqli_fetch_assoc($result_motor2);
	$data_motor3 = mysqli_fetch_assoc($result_motor3);
	$data_mobil1 = mysqli_fetch_assoc($result_mobil1);
	$data_mobil2 = mysqli_fetch_assoc($result_mobil2);
	$data_mobil3 = mysqli_fetch_assoc($result_mobil3);



		// echo "ASD".$data_motor1['jumlahmotor1'];
		// echo $nom;

	?>
	<!-- asdasdasdasd -->
	<script>
		window.onload = function () {
			var raw_motor1 = <?php echo $data_motor1['jumlahmotor1']?>;
			var raw_motor2 = <?php echo $data_motor2["jumlahmotor2"]?>;
			var raw_motor3 = <?php echo $data_motor3["jumlahmotor3"]?>;
			var raw_mobil1 = <?php echo $data_mobil1["jumlahmobil1"]?>;
			var raw_mobil2 = <?php echo $data_mobil2["jumlahmobil2"]?>;
			var raw_mobil3 = <?php echo $data_mobil3["jumlahmobil3"]?>;
			var chart = new CanvasJS.Chart("chartContainer", {
				exportEnabled: true,
				animationEnabled: true,
				title:{
					text: "Jumlah Pembelian "
				},
				subtitles: [{
					text: ""
				}], 
				axisX: {
					title: "States"
				},
				axisY: {
					title: "Motor - Units",
					titleFontColor: "#4F81BC",
					lineColor: "#4F81BC",
					labelFontColor: "#4F81BC",
					tickColor: "#4F81BC"
				},
				axisY2: {
					title: "Mobil - Units",
					titleFontColor: "#C0504E",
					lineColor: "#C0504E",
					labelFontColor: "#C0504E",
					tickColor: "#C0504E"
				},
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
					type: "column",
					name: "Motor",
					showInLegend: true,      
					yValueFormatString: "#,##0.# Units",
					dataPoints: [
					{ label: "15.000-50.000",  y: raw_motor1},
					{label: "50.000-100.000", y: raw_motor2},
					{label: "100.000-500.000", y:raw_motor3}
					]
				},
				{
					type: "column",
					name: "Mobil",
					axisYType: "secondary",
					showInLegend: true,
					yValueFormatString: "#,##0.# Units",
					dataPoints: [
					{ label: "15.000-50.000", y:raw_mobil1},
					{label: "50.000- 100.000", y:raw_mobil2},
					{label: "100.000- 500.000",y:raw_mobil3}
					]
				}]
			});
			chart.render();

			function toggleDataSeries(e) {
				if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
					e.dataSeries.visible = false;
				} else {
					e.dataSeries.visible = true;
				}
				e.chart.render();
			}

		}
	</script>
</head>
<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<div>
		<a href="index.php?menu=graph"><button class="btn btn-primary"> Previous</button></a>
	</div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>