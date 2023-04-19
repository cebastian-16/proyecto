<?php
include("connection.php");

$con = connection();


$sql = "SELECT * FROM datos LIMIT 4";
$query = mysqli_query($con, $sql);

$sql = "SELECT `SISTEMAOPERATIVO`, count(`SISTEMAOPERATIVO`) CANTIDAD FROM `datos` GROUP by `SISTEMAOPERATIVO`";
$resultado = mysqli_query($con, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $datos[$fila['SISTEMAOPERATIVO']] = $fila['CANTIDAD'];
}

$sql = "SELECT `almacenamiento`, count(`almacenamiento`) CANTIDAD FROM `datos` GROUP by `almacenamiento`";
$resultado = mysqli_query($con, $sql);
$datos2 = array();
while ($fila = mysqli_fetch_assoc($resultado)) {
    $datos2[$fila['almacenamiento']] = $fila['CANTIDAD'];
}



//Cerrar la conexión a la base de datos
mysqli_close($con);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<script>
    function confirmacion() {
        var respuesta = confirm("¿Desea realmente borrar el registro?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }

    const toggle = document.getElementById('theme-toggle');
    const body = document.body;

    toggle.addEventListener('click', () => {
        body.classList.toggle('dark-theme');
    });
</script>



<body>

    <nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="background-color: #6264DF">Opciones</button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <a href="insert.php">
                        <h2>Ingresar Caracteristicas</h2>
                    </a>
                    <a href="index1.php">
                        <h2>Graficas</h2>
                    </a>
                    
                    <a href="exportar.php">
                       <h2> Informe Excel</h2>
                    </a>

                </div>
            </div>


            <body>

                
                <form action="busqueda.php" method="post">
                    <label for="query">Buscar: </label>
                    <input type="text" name="query" id="query">
                    <input type="submit" value="Buscar"></input>

                </form>

                <a href="cerrarsession.php"  class="btn btn-outline-primary">
                    <span class="glyphicon glyphicon-off"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-box-arrow-left" viewBox="0 0 16 16" >
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                    </svg>
                </a>

        </div>

    </nav>


</body>

<div class="users-table">

    <table class="table-bordered">
        <thead>
            <tr>
                <th>Sistema operativo</th>
                <th>CPU</th>
                <th>Cache</th>
                <th>Memoria</th>
                <th>Almacenamiento</th>
                <th>Direccion ip</th>
                <th>Mac</th>
                <th>Ultimo mantenimiento</th>
                <th>Proximo mantenimiento</th>
                <th>V_FINAL </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)) : ?>
                <tr>


                    <th>
                        <?= $row['SISTEMAOPERATIVO'] ?>
                    </th>
                    <th>
                        <?= $row['CPU'] ?>
                    </th>
                    <th>
                        <?= $row['cache'] ?>
                    </th>
                    <th>
                        <?= $row['memoria'] ?>
                    </th>
                    <th>
                        <?= $row['almacenamiento'] ?>
                    </th>
                    <th>
                        <?= $row['direccion'] ?>
                    </th>
                    <th>
                        <?= $row['mac'] ?>
                    </th>
                    <th>
                        <?= $row['ultimo_mantenimiento'] ?>
                    </th>
                    <th>
                        <?= $row['proximo_mantenimiento'] ?>
                    </th>
                    <th>
                        <?= $row['V_FINAL'] ?>

                    </th>
                    </th>
                    <th><a href="update.php?id=<?= $row['id'] ?>" class="btn btn-outline-primary">Editar</a></th>
                    <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="btn btn-outline-danger" onclick='return confirmacion()'>Eliminar</a>
                    </th>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-center">
    <div class="row">
        <div id="myChartContainer">
            <h2 class="chartTitle">Sistemas Operativos</h2>
            <canvas id="grafico" style=" height: 300px; max-height: 300px; max-width: 100%;"></canvas>
        </div>

        <div id="myChartContainer2">
            <h2 class="chartTitle">ALMACENAMIENTO</h2>
            <canvas id="grafico2" style=" height: 300px; max-height: 300px; max-width: 100%;"></canvas>
        </div>

    </div>
</div>


<script>
    var datos = <?php echo json_encode($datos); ?>;

    var opciones = {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            animateRotate: true,
            duration: 1000
        }

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
                   
                ]
            }]
        },
        options: opciones
    };

    var ctx = document.getElementById('grafico').getContext('2d');
    new Chart(ctx, config);
</script>

<script>
    var datos2 = <?php echo json_encode($datos2); ?>;

    var opciones = {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            animateRotate: true,
            duration: 1000
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }

    };

    var config = {
        type: 'bar',
        data: {
            labels: Object.keys(datos2),
            datasets: [{
                data: Object.values(datos2),
                backgroundColor: [
                    '#ff6384',
                    '#36a2eb'
                ]
            }]
        },
        options: opciones
    };

    var ctx = document.getElementById('grafico2').getContext('2d');
    new Chart(ctx, config);
</script>



</div>

</body>

</html>