<?php


include("connection.php");
$con = connection();

$id=$_GET['id'];

$sql=("DELETE FROM `datos` WHERE id ='$id'");

$query = mysqli_query($con, $sql);


if($query){
    echo "<script> alert('El formulario se elimino correctamente'); location.href='index.php'; </script>";
}else{
    echo "<script> alert('El formulario no elimino correctamente :( '); location.href='index.php'; </script>";
}


?>

