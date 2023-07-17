
<?php include('template/cabecera.php');
 session_start();
?>



            <div class="col-md-12">


                 <div class="jumbotron">
                    <h1 class="display-3">Bienvenido! <?php echo $_SESSION['nombreUsuario'];// echo $nombreUruario; ?></h1> 
                    <p class="lead">Vamos a administrar nuestros muebles  en el sitio web </p>
                    <hr class="my-2">
                 
                    <p class="lead">Recuerda que la informacion de la empresa es confidencial. <br>
                        Asegurate de guardar la informacion antes de salir de la pagina. 
                        
                    </a>
                    </p>
                 </div>


                
            </div>
   
<?php include('template/pie.php'); ?>