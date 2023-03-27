<?php
include("connection.php");
$con = connection();


$id = null;

$SISTEMAOPERATIVO = $_POST['SISTEMAOPERATIVO'];
$CPU = $_POST['CPU'];
$cache = $_POST['cache'];
$memoria = $_POST['memoria'];
$almacenamiento = $_POST['almacenamiento'];
$mac = $_POST['mac'];
$direccion = $_POST['direccion'];
$ultimo_mantenimiento = $_POST['ultimo_mantenimiento'];
$proximo_mantenimiento = $_POST['proximo_mantenimiento'];
$año_lanzamiento = $_POST['año_lanzamiento'];
$fecha_compra = $_POST['fecha_compra'];

$promedio=$V_CPU + $V_MEM + $V_DISCO;
$V_FINAL = $promedio / 3;

$V_CPU = $_POST['V_CPU'];
$V_MEM= $_POST['V_MEM'];
$V_DISCO= $_POST['V_DISCO'];

$V_FINAL= $_POST['V_FINAL'];


$sql = "INSERT INTO `datos` 
VALUES ('$id','$SISTEMAOPERATIVO','$CPU ','$cache ','$memoria','$almacenamiento','$mac','$direccion','$ultimo_mantenimiento', '$proximo_mantenimiento', '$año_lanzamiento' ,'$fecha_compra', '$V_CPU', '$V_MEM', '$V_DISCO', '$V_FINAL') ";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: insert.php");
}else{

}
?>