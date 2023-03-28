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
$sql = "SELECT * FROM datos WHERE id LIKE '%$query%' OR SISTEMAOPERATIVO LIKE '%$query%'";

// Ejecutar la consulta SQL
$resultado = $mysqli->query($sql);

// Mostrar los resultados
if ($resultado->num_rows > 0) {
    while ($filas = $resultado->fetch_assoc()) {
        // echo '<p><strong>' . $fila['id'] . '</strong>: ' . $fila['SISTEMAOPERATIVO'] . '</p>';
        $fila = "<table style='border-collapse: collapse'>";
        $fila .= "<thead  style='background-color: #f2f2f2'>";
        $fila .= "<tr>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>id</th>";
        $fila .= "<th style='padding: 10px; border: 1px solid black'>SISTEMAOPERATIVO</th>";
        $fila .= "</tr>";
        $fila .= "</thead>";
        $fila .= "<tbody>";

        $fila .= "<tr>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['id'] . "</td>";
        $fila .= "<td style='padding: 10px; border: 1px solid black'>" . $filas['SISTEMAOPERATIVO'] . "</td>";
        $fila .= "</tr>";

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
