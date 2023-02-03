<?php
include("connection.php");  
$con = connection();

$id =$_POST['id'];

$SISTEMAOPERATIVO = $_POST['SISTEMAOPERATIVO'];
$CPU = $_POST['CPU'];
$cache = $_POST['cache'];
$memoria = $_POST['memoria'];
$almacenamiento = $_POST['almacenamiento'];
$direccion = $_POST['direccion'];
$mac = $_POST['mac'];
$ultimo_mantenimiento = $_POST['ultimo_mantenimiento'];
$proximo_mantenimiento = $_POST['proximo_mantenimiento'];
$año_lanzamiento = $_POST['año_lanzamiento'];
$fecha_compra = $_POST['fecha_compra'];
$V_CPU = $_POST['V_CPU'];
$V_MEM= $_POST['V_MEM'];
$V_DISCO= $_POST['V_DISCO'];
$V_FINAL= $_POST['V_FINAL'];

$V_FINAL= $_POST['V_FINAL'];

$promedio=$V_CPU + $V_MEM + $V_DISCO;
$V_FINAL = $promedio / 3;


$sql="UPDATE datos SET SISTEMAOPERATIVO='$SISTEMAOPERATIVO',CPU='$CPU',cache='$cache',memoria='$memoria',almacenamiento='$almacenamiento',direccion='$direccion',mac='$mac',ultimo_mantenimiento='$ultimo_mantenimiento',proximo_mantenimiento='$proximo_mantenimiento', año_lanzamiento='$año_lanzamiento' ,fecha_compra='$fecha_compra',V_CPU='$V_CPU', V_MEM='$V_MEM' ,V_DISCO='$V_DISCO', V_FINAL='$V_FINAL'  WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    echo "<script> alert('el formulario se edito correctamente :) '); location.href='index.php' </script>";
} else {
    echo "<script> alert('el formulario no se correctamente  :( '); location.href='index.php' </script>";
}
?>
