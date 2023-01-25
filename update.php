<?php
include("connection.php");
$con = connection();

$id = $_GET['id'];

$sql = "SELECT * FROM datos WHERE id='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar usuarios</title>

</head>
<script>
    function editar() {
        var respuesta = confirm("¿Desea editar el registro?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }
</script>

<body>
    <div class="users-form">
        <form action="edit_user.php" method="POST">

            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="text" name="equipo" placeholder="equipo" value="<?= $row['equipo'] ?>">
            <input type="text" name="CPU" placeholder="CPU" value="<?= $row['CPU'] ?>">
            <input type="text" name="SISTEMAOPERATIVO" placeholder="SISTEMAOPERATIVO"value="<?= $row['SISTEMAOPERATIVO'] ?>">
            <input type="text" name="cache" placeholder="cache" value="<?= $row['cache'] ?>">
            <input type="text" name="memoria" placeholder="memoria" value="<?= $row['memoria'] ?>">
            <input type="text" name="almacenamiento" placeholder="almacenamiento" value="<?= $row['almacenamiento'] ?>">
            <input type="text" name="direccion" placeholder="direccion" value="<?= $row['direccion'] ?>">
            <input type="text" name="mac" placeholder="mac" value="<?= $row['mac'] ?>">
            <input type="date" name="ultimo_mantenimiento" placeholder="ultimo_mantenimiento"value="<?= $row['ultimo_mantenimiento'] ?>">
            <input type="date" name="proximo_mantenimiento" placeholder="proximo_mantenimiento"value="<?= $row['proximo_mantenimiento'] ?>">
            <input type="date" name="año_lanzamiento" placeholder="año_lanzamiento"value="<?= $row['año_lanzamiento'] ?>">
            <input type="date" name="fecha_compra" placeholder="fecha_compra" value="<?= $row['fecha_compra'] ?>">
            <input type="text" name="V_CPU" placeholder="V_CPU"value="<?= $row['V_CPU'] ?>">
            <input type="text" name="V_MEM" placeholder="V_MEM"value="<?= $row['V_MEM'] ?>">
            <input type="text" name="V_DISCO" placeholder="V_DISCO"value="<?= $row['V_DISCO'] ?>">
            <input type="hidden" name="V_FINAL" value="<?= $row['V_FINAL'] ?>">
            

            <input type="submit" action="edit_user.php" value="Actualizar" onclick='return editar()'>
        </form>
    </div>
</body>

</html>