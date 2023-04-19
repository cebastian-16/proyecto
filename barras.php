<?php
include("connection.php");
$con = connection();
$sql = "SELECT `SISTEMAOPERATIVO`, count(`SISTEMAOPERATIVO`) CANTIDAD FROM `datos` GROUP by `SISTEMAOPERATIVO`";
$result = mysqli_query($con, $sql);
$valoresY = array(); //montos
$valoresX = array(); //fechas

while ($ver = mysqli_fetch_row($result)) {
	$valoresY[] = $ver[1];
	$valoresX[] = $ver[0];
}

$datosX = json_encode($valoresX);
$datosY = json_encode($valoresY);
?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json) {
		var parsed = JSON.parse(json);
		var arr = [];
		for (var x in parsed) {
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">
	datosX = crearCadenaBarras('<?php echo $datosX ?>');
	datosY = crearCadenaBarras('<?php echo $datosY ?>');

	var data = [{
		x: datosX,
		y: datosY,
		type: 'bar',
		options: {
			animation: {
				onComplete: () => {
					delayed = true;
				},
				delay: (context) => {
					let delay = 0;
					if (context.type === 'data' && context.mode === 'default' && !delayed) {
						delay = context.dataIndex * 300 + context.datasetIndex * 100;
					}
					return delay;
				},
			},
			scales: {
				x: {
					stacked: true,
				},
				y: {
					stacked: true
				}
			}
		}
	}];

	Plotly.newPlot('graficaBarras', data);
</script>