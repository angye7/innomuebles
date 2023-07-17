 <?php include ("../template/cabecera.php"); ?>

<div class="container">
    

    <?php if($mensaje!=""){?>
    <div class="alert alert-success">
    <?php echo $mensaje;?>
        Pantalla de mensaje...
        <a href="mostrarcarrito.php" class="btn btn-success">Ver carrito</a>

    </div>
   <?php }?>


</div>


<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">  


    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <img src="../Imagenes/inicio.jpg" class="d-block w-100" alt="...">
       <!-- <h1 class="display-4 font-weight-normal">Innomuebles SAC</h1> -->
        <p class="lead font-weight-normal">Somos una empresa dedicada al diseño, fabricación e instalación de muebles en Melamina, Mdf derivados</p>
        <a class="btn btn-success" href="../Paginas/productos.php">Mira nuestros productos disponibles </a>
        <a class="btn btn-info" href="#">Cotiza tu producto personalizado</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>


  


<div class="container ">
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 justify-content-between">

      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Nuestros trabajos </h2>
          <p class="lead">Trabajos </p>
        </div>

        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
    
            <img src="../Imagenes/inicio.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;" alt="...">
        </div>
      </div>
      

      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Nuestros trabajos</h2>
          <p class="lead">Es</p>
        </div>
        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <img src="../Imagenes/inicio.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;" alt="...">
        </div>
      </div>

    </div>
</div>



<div class="container ">
    <div class="d-md-flex flex-md-equal w-200 my-md-3 pl-md-3 justify-content-between">

      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
          <h2 class="display-5">Outro título</h2>
          <p class="lead">E outra descrição mais engraçadinha ainda.</p>
        </div>

        <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
    
            <img src="../Imagenes/inicio.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;" alt="...">
        </div>
      </div>
      

      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5  text-center overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Outro título</h2>
          <p class="lead">E outra descrição mais engraçadinha ainda.</p>
        </div>
        <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
            <img src="../Imagenes/inicio.jpg" style="width: 100%; height: 300px; border-radius: 21px 21px 0 0;" alt="...">
        </div>
      </div>

    </div>
</div>

    






<?php include ("../template/pie.php"); ?>


