<?php include ("../template/cabecera.php"); 
?>
 <div class="container">
    <br>
    <br>
    <div  class="row">

<?php if($mensaje!=""){?>
    <div class="alert alert-success">
    <?php echo $mensaje;?>
        
        <a href="mostrarcarrito.php" class="btn btn-success">Ver carrito</a>

    </div>
   <?php }?>


<?php


$sentenciaSQL= $conexion -> prepare("select * from muebles");
$sentenciaSQL -> execute();
$listaMuebles= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaMuebles as $mueble) { ?>
<div class="col-md-3">
    
    <div class="card">
        <img 
        class="card-img-top" height="300" width="200" src="../Imagenes/<?php echo $mueble['Imagen']; ?>"  alt=""
        
        data-toggle="popover"
        data-trigger="hover"
        data-content="<?php echo $mueble['Descripcion']; ?>"
        >
        <div class="card-body">
            <h4 class="card-title"><?php echo $mueble['Nombre']; ?> </h4>
            <p class="card-title"><?php echo $mueble['TipoMueble']; ?> </p>
            <p class="card-title">Color: <?php echo $mueble['color']; ?> </p>
            <p class="card-title">Material: <?php echo $mueble['material']; ?> </p>
            <!--<small class="card-title "><?php echo $mueble['Descripcion']; ?> </small>

-->
            
            <small font size=4 class="card-title" >El mueble tiene <?php echo $mueble['alto']; ?> de alto, <?php echo $mueble['ancho']; ?> de ancho, y <?php echo $mueble['profundidad']; ?> de profundidad. </small>
            
           <br> 
           <br><br>
            <h4 class="card-title center">S/. <?php echo  number_format($mueble['PrecioBase'],2); ?> </h4>
<br>

            <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt( $mueble['idprod'], COD, KEY); ?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt( $mueble['Nombre'], COD, KEY); ?>">
                <input type="hidden" name="precio" id="precio" value="<?php echo  openssl_encrypt( $mueble['PrecioBase'], COD, KEY); ?>">
                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt( 1, COD, KEY); ?>">

            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
            
            </form>
        </div>
    </div>
    <br>
</div>

<?php }?>


</div>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
});

</script>
</div>
</div>

<?php include ("../template/pie.php"); ?>
