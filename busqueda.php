<?php
// Conexión a la base de datos
include("connection.php");
$mysqli = connection();

// Verificar si la conexión fue exitosa
if ($mysqli->connect_error) {
    die('Error de conexión (' . $mysqli->connect_errno . ') '
        . $mysqli->connect_error);
}

// Obtener el término de búsqueda
$query = isset($_POST['query']) ? $_POST['query'] : '';

// Preparar la consulta SQL
$sql = "SELECT * FROM datos WHERE SISTEMAOPERATIVO = '$query' ";

// Ejecutar la consulta SQL
$resultado = $mysqli->query($sql);

// Mostrar los resultados
if ($resultado->num_rows > 0) {
    while ($filas = $resultado->fetch_assoc()) {
        $fila = "<table style='border-collapse: collapse'>";
        $fila .= "<thead  style='background-color: #f2f2f2'>";
        $fila .= "<tr>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>INICIO</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>SISTEMAOPERATIVO</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>CPU</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>cache</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>memoria</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>almacenamiento</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>direccion</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>mac</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>ultimo_mantenimiento</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>proximo_mantenimiento</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>año_lanzamiento</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>fecha_compra</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>V_FINAL</th>";
        $fila .= "</tr>";
        $fila .= "</thead>";
        $fila .= "<tbody>";

        $fila .= "<tr>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'><a href='index.php'><h2>Inicio</h2></a> </td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['SISTEMAOPERATIVO'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['CPU'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['cache'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['memoria'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['almacenamiento'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['direccion'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['mac'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['ultimo_mantenimiento'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['proximo_mantenimiento'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['año_lanzamiento'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['fecha_compra'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['V_FINAL'] . "</td>";
        $fila .= "</tr>";
        $fila .= "<br>";
        $fila .= "</tbody>";
        $fila .= "</table>";

        // Imprimir la tabla en HTML
        echo $fila;
    }
} else {
    echo '<p>No se encontraron resultados</p>';
}

// Cerrar la conexión a la base de datos
$mysqli->close();
