<?php
// Conexión a la base de datos MySQL
include("connection.php");
$con = connection();


$sql = "SELECT `SISTEMAOPERATIVO`, count(`SISTEMAOPERATIVO`) CANTIDAD FROM `datos` GROUP by `SISTEMAOPERATIVO`";

//Ejecutar la consulta y almacenar los resultados en un arreglo asociativo
$resultado = mysqli_query($con, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $datos[$fila['SISTEMAOPERATIVO']] = $fila['CANTIDAD'];
}

//Cerrar la conexión a la base de datos
mysqli_close($con);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Gráfico de donut con PHP y MySQL</title>
    <script src="chart.js"></script>
</head>

<body>

    <div style="width: 400px; height: 400px;">
        <canvas id="grafico"></canvas>
    </div>
    
    <script>
        var datos = <?php echo json_encode($datos); ?>;

        var opciones = {
            responsive: true,
            maintainAspectRatio: false,
        };

        var config = {
            type: 'doughnut',
            data: {
                labels: Object.keys(datos),
                datasets: [{
                    data: Object.values(datos),
                    backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#cc65fe',
                        '#ffce56',
                        '#2E31E5',
                        '#E52E6E',
                        '#19E21C',
                        '#EA33BB'
                    ]
                }]
            },
            options: opciones
        };

        var ctx = document.getElementById('grafico').getContext('2d');
        new Chart(ctx, config);
    </script>

    </div>
</body>

</html>