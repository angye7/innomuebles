<?php include ("../template/cabecera.php"); 

?>
<div class="container">
    <br>
    <br>
    <div  class="row">
<br>
<h3>Lista del carrito</h3>

<?php if(!empty($_SESSION['CARRITO'])){ ?> 

<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%">Descripcion</th>
            <th width="15%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">--</th>
        </tr>

        <?php $total=0;?>

        <?php foreach($_SESSION['CARRITO']as $indice=>$mueble){?>
        <tr>
            <td width="40%"><?php echo $mueble['NOMBRE']?></th>
            <td width="15%" class="text-center"><?php echo $mueble['CANTIDAD']?></th>
            <td width="20%" class="text-center">S/.<?php echo $mueble['PRECIO']?></th>
            <td width="20%" class="text-center">S/.<?php echo number_format(($mueble['PRECIO']*$mueble['CANTIDAD']),2);?></th>
            <td width="5%">

            <form action="" method="post">

                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt( $mueble['ID'], COD, KEY); ?>">

                    <button class="btn btn-danger"  
                    type="submit"
                    name="btnAccion"
                    value="Eliminar"
                    >Eliminar</button>
            </form>

            </th>
        </tr>

        <?php $total=$total+($mueble['PRECIO']*$mueble['CANTIDAD']);?>

    <?php }?>

        <tr>
            <td colspan="3" align="right" ><h3>Total</h3></td>
            <td align="right"> <h3>S/.<?php echo number_format($total,2);?></h3></td>
            <td></td>

        </tr>

        <tr>
            <td colspan="5" >

            <form action="pagar.php" method="post">
                <div class="alert alert-success">

                <div class="form group">
                    <label for="my-input">Correo de contacto:</label>
                    <input  id="email" name ="email" type="email" class="form-control" placeholder="por favor escribe tu correo" required>


                    </div>
                <small id="emailHelp" class="form-text text-muted">

                Los productos se enviaran a este correo
                </small>

                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar>></button>
                

            </form>

            </td>

        </tr>
        
    </tbody>
</table>
    
     







<?php }ELSE{?>
    <div class="alert alert-success">
    No hay productos en el carrito...
    </div>

    <?php }?>

</div></div>

<?php include ("../template/pie.php"); ?>
