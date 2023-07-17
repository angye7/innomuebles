<?php
include("../template/cabecera.php");
include("../config/bd.php");



$txtID1=(isset($_POST['txtIDDetalleVenta']))?$_POST['txtIDDetalleVenta']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";
$Nuevopendiente=(isset($_POST['result']))?$_POST['result']:"";
$nuevoid=(isset($_POST['txtIDVENTA']))?$_POST['txtIDVENTA']:"";


    $txtFecha= null;
    $txtCorreo=null;
    $txtDireccion=null;
    $txtNom=null;
    $txtestado=null;
    $ID=null;
switch($accion){


    case "Ver detalle"; 
    $sentenciaSQL= $conexion -> prepare("SELECT DV.IDVENTA, v.Fecha,  M.Nombre, M.PrecioBase, v.status, DV.ID,v.Correo
    FROM `tbldetalleventa` as DV
    INNER JOIN muebles M ON DV.idprod = M.idprod
    INNER JOIN tblventas V ON DV.IDVENTA = V.ID
     where DV.ID=:idven");
    $sentenciaSQL ->bindParam(':idven',$txtID1);
    $sentenciaSQL -> execute();
    $ventaIn= $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
    $txtID=$ventaIn['ID'];
    $txtIDVENTAA=$ventaIn['IDVENTA'];
    $txtFecha= $ventaIn['Fecha'];
    $txtCorreo=$ventaIn['Correo'];
    $txtDireccion=$ventaIn['Fecha'];
    $txtNom=$ventaIn['Nombre'];
    $txtestado=$ventaIn['status'];
    $ID=$txtID;
   
   
  
    break;

    case "Modificar"; 
  
    $sentenciaSQL= $conexion -> prepare("UPDATE `tblventas` SET `status`=:statuss WHERE id=:idven");
    $sentenciaSQL ->bindParam(':idven',$nuevoid);
    $sentenciaSQL ->bindParam(':statuss',$Nuevopendiente); 

    $sentenciaSQL -> execute();

    echo $nuevoid;
    echo $Nuevopendiente;

  
    
    header("Location:ventas.php");
    break;




    case "Cancelar"; 
    header("Location:ventas.php");
   break;

}











$sentenciaSQL = $conexion->prepare("SELECT DV.IDVENTA, v.Fecha,  M.Nombre, M.PrecioBase, v.status, DV.ID
FROM `tbldetalleventa` as DV
INNER JOIN muebles M ON DV.idprod = M.idprod
INNER JOIN tblventas V ON DV.IDVENTA = V.ID
ORDER BY DV.IDVENTA ASC");
$sentenciaSQL->execute();
$listaVentas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<!--listar cada venta -->

    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="5%">Id Venta</th>
                <th width="30%" class="text-center">Fecha</th>
         
                <th width="20%" class="text-center">Nombre</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Status</th>
            </tr>

            <?php
            foreach ($listaVentas as $venta) {
                
            ?>
                <tr style="background-color: ">
                    <td width="5%"><?php echo $venta['IDVENTA']; ?></td>
                    <td width="15%" class="text-center"><?php echo $venta['Fecha']; ?></td>
                    
                    <td width="20%" class="text-center"><?php echo $venta['Nombre']; ?></td>
                    <td width="20%" class="text-center"><?php echo $venta['PrecioBase']; ?></td>
                    <td width="20%" class="text-center"><?php echo $venta['status']; ?></td>
                    

                    <td>
                    <form method="post" action="">
                        <input type="hidden" name="txtIDDetalleVenta" value="<?php echo $venta['ID']; ?>">
                        
                        <input type="submit" name="accion" value="Ver detalle" class="btn btn-primary">
                    </td>
                    </form>







                    
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


    <style>
.Datos-formulario {
    width: 800px; /* Ancho personalizado */
    margin: 0 auto; /* Centrar horizontalmente */
}
</style>


<div class="card Datos-formulario" id="Datos">
        <div class="card-header">
            Datos de Muebles
        </div>
        <div class="card-body">
            
            
            <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
            <label for="txtIDV">ID:</label>
            <input type="text" required readonly class="form-control" value="<?php echo $txtID1; ?>" name="txtIDV" placeholder="ID">
            <input type="HIDDEN" required readonly class="form-control" value="<?php echo $txtIDVENTAA; ?>" name="txtIDVENTA" placeholder="ID">
            </div>


            <div class = "form-group">
            <label for="txtFecha">Fecha:</label>
            <input type="text" required  readonly class="form-control" value="<?php echo $txtFecha; ?>" name="txtFecha" placeholder="Fecha">
            
            </div>

            <div class = "form-group">
            <label for="txtCorreo">Correo:</label>
            <input type="text" required  readonly class="form-control" value="<?php echo $txtCorreo; ?>" name="txtCorreo" placeholder="Correo">
            </div>

            <div class = "form-group">
            <label for="txtDireccion">Direccion:</label>
            <input type="text" required  readonly class="form-control" value="<?php echo $txtDireccion; ?>" name="txtColor" placeholder="Color">
            </div>

            <div class = "form-group">
            <label for="txtmaterial">Nombre Mueble :</label>
            <input type="text" required  readonly class="form-control" value="<?php echo $txtNom; ?>" name="txtnom" placeholder="NombreMueble">
            </div>

            <div class = "form-group">
            <label for="txtestado">Estado :</label>
            <input type="hidden" required  readonly class="form-control" value="<?php echo $txtestado; ?>" name="txtestado" placeholder="Estado">
            

            <select name="estado" id="estado" class="form-control">
                            <option value="<?php echo $txtestado; ?>"><?php echo $txtestado; ?></option>
                            <option value="Recibido">Recibido</option>
                            <option value="Pendiente por confirmar">Pendiente por confirmar</option>
                            <option value="En almacen">En almacen</option>
                            <option value="Listo para entregar">Listo para entregar</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>

                        <input type="hidden" name="result" id="result" class="form-control">

                        <script>
                    const lenguajes = document.querySelector('#estado');
                    console.log(lenguajes)
                        lenguajes.addEventListener('change', () => {
                        let valorOption = lenguajes.value;
                        console.log(valorOption);

                        var optionSelect = lenguajes.options[lenguajes.selectedIndex];

                        console.log("Opción:", optionSelect.text);
                        console.log("Valor:", optionSelect.value);

                        /*Mostrando el resultado en el input*/
                        let  inputResult = document.querySelector('#result').value=(optionSelect.text);
                        
                        /* Mostrando resultado en la capa capaResultado*/
                        const capa = document.querySelector('#capaResultado');
                        capa.textContent = `Mi lenguaje es: ${valorOption}`;
                        });


                    /* 
                    Otra forma de captura tanto el valor de un select html, como enviar y recibir variables
                    desde el mismo select. Nota: la variable 'variable_xyz' aqui es opcional si deseas enviar alguna 
                    variable o valor de acuerdo a tu necesita 
                    */
                    function mostrarLenguaje(miVariable,filtro){  
                        console.log('El valor de mi variable ' + miVariable);
                        console.log('El valor de mi select ', filtro)
                    }
                    </script>

                        </div>

            <div class="btn-group" role="group" aria-label="">
                
                <button type="submit" name="accion" value="Modificar"  class="btn btn-warning">Modificar</button>
                <button type="submit" name="accion" value="Cancelar"  class="btn btn-info">Cancelar</button>
            </div>

        </form>

        </div>
        
    </div>

