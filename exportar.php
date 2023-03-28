<?php
include("connection.php");
$con = connection();

$sql = "SELECT * FROM datos ";
			
	    	$Result = mysqli_query( $con, $sql );

	    	$productResult = array();

			while( $rows = mysqli_fetch_assoc($Result) ) {
				$productResult[] = $rows;
			}

			$filename = "caracteristicas.xls";

			header("Content-Type: application/vnd.ms-excel");

			header("Content-Disposition: attachment; filename=".$filename);

			$mostrar_columnas = false;

			foreach($productResult as $libro) {

				if(!$mostrar_columnas) {

					echo implode("\t", array_keys($libro)) . "\n";

					$mostrar_columnas = true;

				}

				echo implode("\t", array_values($libro)) . "\n";
            }

?>