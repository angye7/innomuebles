<?php include ("../template/cabecera.php");

?>

<?php
if ($_POST) {
    $total = 0;
    $totalDolares=0;
    $SID = session_id();
    $cORREO = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $indice => $mueble) {
        $total = $total + ($mueble['PRECIO'] * $mueble['CANTIDAD']);
        
    }
    
    $sentencia=$conexion->prepare("INSERT INTO `tblventas` (`ID`, 
    `ClaveTransaccion`, `PaypalDatos`, `Fecha`, `Correo`, `Total`, 
    `status`) 
    VALUES (NULL, :ClaveTransaccion, '', now(),
     :Correo, :Total, 'Recibido');",);
    $sentencia->bindParam(":ClaveTransaccion",$SID);
    $sentencia->bindParam(":Correo",$cORREO);
    $sentencia->bindParam(":Total",$total);
     $sentencia-> execute();

     $idVenta=$conexion->lastInsertId();


     foreach ($_SESSION['CARRITO'] as $indice => $mueble) {

        $sentencia=$conexion->prepare("INSERT INTO `tbldetalleventa`
         (`ID`, `IDVENTA`, `idprod`, `PRECIOUNITARIO`, `CANTIDAD`, 
         `DESCARGADO`) VALUES (NULL, :IDVENTA, :idprod, :PRECIOUNITARIO, 
         :CANTIDAD, '0');");
        $sentencia->bindParam(":IDVENTA",$idVenta);
        $sentencia->bindParam(":idprod",$mueble['ID']);
        $sentencia->bindParam(":PRECIOUNITARIO",$mueble['PRECIO']);
        $sentencia->bindParam(":CANTIDAD",$mueble['CANTIDAD']);
        $sentencia-> execute();

     }
   
    // Resto del código...

}



?>

<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso final!</h1>
    <hr class="my-4">
    <p class="lead">Estás a punto de pagar con PayPal la cantidad de:</p>

    <h4>S/.<?php echo number_format($total, 2); ?></h4>

    <div class="text-center" id="paypal-button-container"></div>

    <p>El área de ventas se contactará con usted luego de procesado el pago.<br>
        <strong>(Para aclaraciones: innomueblessac@gmail.com)</strong>
    </p>
</div>

<style>
    #paypal-button-container {
        
        justify-content: center;
        margin-left: 600px;
        margin-top: 20px;
    }
</style>

<script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $total; ?>',
                        currency_code: 'USD'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log(details);
            });
        }
    }).render('#paypal-button-container');
</script>

<?php include ("../template/pie.php"); ?>
