<?php
include("connection.php");
$con = connection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<body>

<nav class="navbar bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Opciones</button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <a href="index.php">  <h2>Inicio</h2></a>
                </div>
            </div>

            <a href="cerrarsession.php" class="btn btn-outline-primary">
        <span class="glyphicon glyphicon-off"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
            <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z" />
        </svg>
    </a>

        </div>

    </nav>

<div class="users-form">
        <h4>Crear informacion del computador</h4>
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

    
</body>
</html>