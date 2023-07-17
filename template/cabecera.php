<?php 
include ("../administrador/config/bd.php");
include ("../Paginas/carrito.php");
?>

<!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Innomuebles</title>
     <link rel="stylesheet" href="../CSS/bootstrap.min.css"/>
 </head>
 <body>


    

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
        <ul class="nav navbar-nav">
        <li class="nav-item "><a class="nav-link" href="#">
            <img src="../Imagenes/Logo.png" alt="" width="50" height="50">
            <strong>Innomuebles SAC</strong>
            </a></li>


            <li class="nav-item ">
                <a class="nav-link" href="../Paginas/principal.php">Inicio</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Paginas/nosotros.php">Nosotros</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../Paginas/productos.php">Productos</a>
            </li>

            
            
        </ul>

      
        <a class="btn btn-warning btn-sm-2 my-2 my-lg-2 boton" href="../Paginas/mostrarcarrito.php" role="button"> 
            Carrito (<?php 
            echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
            
            ?>)</a>

<!--
        <a class="btn btn-info btn-sm-2 my-2 my-lg-2 boton" href="../Paginas/mostrarcarrito.php" role="button"> 
            Sigue tu pedido
            
            </a>

            

            <button  class="btn btn-info btn-sm-2 my-2 my-lg-0">
            Inicia sesion 
            
            </button>
-->
        


    </nav>



