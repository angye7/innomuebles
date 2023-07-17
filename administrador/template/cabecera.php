<?php 
 


/*  if(!isset($_SESSION['usuario'])){
    header("Location:../index.php");
  }else 
  {
    if($_SESSION['usuario']=="ok"){
      $nombreUruario=$_SESSION["nombreUsuario"];
    }
  }*/
?>
<!doctype html>
<html lang="en">  
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <?php $url="http://".$_SERVER['HTTP_HOST']."/ProyectoTesis2"?>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador de pagina <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/productos.php">Productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/Paginas/principal.php">Ir al sitio web</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/ventas.php"> Ventas </a>
            <a class="btn btn-danger" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar sesion</a>
        </div>
    </nav>



    <div class="container">
        <br/>
        <div class="row">

