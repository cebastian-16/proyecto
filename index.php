<?php
include("connection.php");
$con = connection();


$sql = "SELECT * FROM datos";
$query = mysqli_query($con, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Users CRUD</title>
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

    <div class="users-form">
        <h1>Crear informacion del computador</h1>
        <form action="insert_user.php" method="POST">
            <input type="text" name="CPU" for="CPU" placeholder="CPU">
            <input type="text" name="SISTEMAOPERATIVO" for="SISTEMAOPERATIVO" placeholder="SISTEMAOPERATIVO">
            <input type="text" name="cache" for="cache" placeholder="cache">
            <input type="text" name="memoria" for="memoria" placeholder="memoria">
            <input type="text" name="almacenamiento" for="almacenamiento" placeholder="almacenamiento">
            <input type="text" name="direccion" for="direccion" placeholder="direccion">
            <input type="text" nname="mac" for="mac" placeholder="mac">
            <input type="date" name="ultimo_mantenimiento" for="ultimo_mantenimiento"placeholder="ultimo_mantenimiento">
            <input type="date" name="proximo_mantenimiento" for="proximo_mantenimiento"placeholder="proximo_mantenimiento">
            <input type="date" name="año_lanzamiento" for="año_lanzamiento"placeholder="año_lanzamiento">
            <input type="date" name="fecha_compra" for="fecha_compra" placeholder="fecha_compra" >
            <input type="int" name="V_CPU" for="V_CPU"placeholder="V_CPU">
            <input type="int" name="V_MEM" for="V_MEM"placeholder="V_MEM">
            <input type="int" name="V_DISCO" for="V_DISCO"placeholder="V_DISCO">
           

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="users-table">
        <h2>Computadores registrados</h2>
        <table>
            <thead>
                <tr>

                    <th>Id</th>
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
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th>
                            <?= $row['id'] ?>
                        </th>
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
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete"
                                onclick='return confirmacion()'>Eliminar</a>
                        </th>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>