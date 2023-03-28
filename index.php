<?php
include("connection.php");
$con = connection();


$sql = "SELECT * FROM datos LIMIT 10";
$query = mysqli_query($con, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet" href="librerias/bootstrap/css/bootstrap.css">
    <title>Users CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
                </div>
            </div>


            <body>
                <a href="exportar.php">
                    <button type="button" class="btn btn-success"   style="background-color: #6264DF">Informe
                        Excel</button>
                </a>

                <form action="busqueda.php" method="post">
                    <label for="query">Buscar: </label >
                    <input type="text" name="query" id="query">
                    <input type="submit" value="Buscar" ></input>
                    
                </form>
   
                <a href="cerrarsession.php" class="btn btn-outline-primary">
                    <span class="glyphicon glyphicon-off"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
                    </svg>
                </a>

        </div>

    </nav>


</body>

<div class="users-table">

    <table class="table-bordered">
        <thead>
            <tr>
                <th>CPU</th>
                <th>Sistema operativo</th>
                <th>Cache</th>
                <th>Memoria</th>
                <th>Almacenamiento</th>
                <th>Direccion ip</th>
                <th>Mac</th>
                <th>Ultimo mantenimiento</th>
                <th>Proximo mantenimiento</th>
                <th>año de lanzamiento de la CPU</th>
                <th>Fecha de compra de la CPU</th>
                <th>V_CPU</th>
                <th>V_MEM</th>
                <th>V_DISCO</th>
                <th>V_FINAL </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($query)) : ?>
                <tr>


                    <th>
                        <?= $row['CPU'] ?>
                    </th>
                    <th>
                        <?= $row['SISTEMAOPERATIVO'] ?>
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
                        <?= $row['año_lanzamiento'] ?>
                    </th>
                    <th>
                        <?= $row['fecha_compra'] ?>

                    </th>
                    <th>
                        <?= $row['V_CPU'] ?>
                    </th>
                    <th>
                        <?= $row['V_MEM'] ?>
                    </th>
                    <th>
                        <?= $row['V_DISCO'] ?>
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



</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#cargaLineal').load('lineal.php');
        $('#cargaBarras').load('barras.php');
    });
</script>