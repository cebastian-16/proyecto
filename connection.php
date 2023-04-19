<?php

function connection()
{

    $host = "localhost";
    $user = "root";
    $pass = "123456";

    $bd = "bodega";

    $connect = mysqli_connect($host, $user, $pass);

    mysqli_select_db($connect, $bd);

    return $connect;

}


?>