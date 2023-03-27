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
    while ($fila = $resultado->fetch_assoc()) {
        echo '<p><strong>' . $fila['id'] . '</strong>: ' . $fila['SISTEMAOPERATIVO'] .'</p>';
    }
} else {
    echo '<p>No se encontraron resultados</p>';
}

// Cerrar la conexión a la base de datos
$mysqli->close();
?>