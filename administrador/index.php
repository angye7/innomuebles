
<?php

session_start();

$txtUsuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
$txtContraseña=(isset($_POST['contrasenia']))?$_POST['contrasenia']:"";
include("config/bd.php"); 


    
   /* echo $resultado['nombre'] ;
    echo $resultado['contraseña'];  
    echo $txtContraseña;
    */
    //print_r($_SESSION);
    
   // <a href="seccion/cerrar.php"> Cerrar</a>
   $formularioEnviado = false;
    if (!empty($_POST['usuario']) && !empty($_POST['contrasenia'])) {

        $formularioEnviado = true;
        $sentenciaSQL= $conexion -> prepare("select id,nombre, contraseña from trabajador where nombre=:usuario");
    $sentenciaSQL ->bindParam(':usuario',$txtUsuario);
    $sentenciaSQL -> execute();

    $resultado= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(($_POST['usuario']==$resultado['nombre'])&&($_POST['contrasenia']==$resultado['contraseña'])){
            //if($resultado['contraseña']==$txtContraseña) {
                
            $_SESSION['nombreUsuario']=$resultado['nombre'];
            echo $resultado['nombre'];
            print_r($_SESSION); 
            header("Location:inicio.php");

            }else{
                $mensaje="Error:usuario incorrecto";
                
                /*echo $resultado['nombre'];
                echo $resultado['contraseña'];
                echo $_POST['usuario'];
                echo $_POST['contrasenia'];*/
            }
    } else {
        //$mensaje = ($formularioEnviado) ? "Error: faltan campos" : "";
        }

    
   

  /* if(($_POST['usuario']=="develoteca")&&($_POST['contrasenia']=="sistema")){

        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="angye";
    


    header('Location:inicio.php');
    }else{
        $mensaje="Error:usuario incorrecto";
    
    }*/


?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   
<div class="container">
    <div class="row">

    <div class="col-md-4">
        
    </div>

        <div class="col-md-4">
            <br/> <br/> <br/>
            <div class="card">
                <div class="card-header">
                    Entrada al sistema
                </div>
                <div class="card-body">
                
                <?php 
                
                if(isset($mensaje)) {
                
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
                <?php } ?>

                    <form  method="POST">


                        <div class = "form-group">
                        <label >Usuario</label>
                        <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu usuario">
                        <small id="emailHelp" class="form-text text-muted"></small>
                        </div>


                        <div class="form-group">
                        <label >Contraseña</label>
                        <input type="password" class="form-control" name="contrasenia" placeholder="Ingresa tu contraseña">
                        </div>


                    
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>



                </div>
                
            </div>
        </div>
        
    </div>
</div>

  </body>
</html>
