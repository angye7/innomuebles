<?php include("../template/cabecera.php"); ?>

<?php 

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtTipoMueble=(isset($_POST['txtTipoMueble']))?$_POST['txtTipoMueble']:"";
$txtColor=(isset($_POST['txtColor']))?$_POST['txtColor']:"";
$txtmaterial=(isset($_POST['txtmaterial']))?$_POST['txtmaterial']:"";
$txtalto=(isset($_POST['txtalto']))?$_POST['txtalto']:"";
$txtancho=(isset($_POST['txtancho']))?$_POST['txtancho']:"";
$txtprofundidad=(isset($_POST['txtprofundidad']))?$_POST['txtprofundidad']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtStock=(isset($_POST['txtStock']))?$_POST['txtStock']:"";
$txtPrecioBase=(isset($_POST['txtPrecioBase']))?$_POST['txtPrecioBase']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

 include("../config/bd.php"); 



switch($accion){

    case "Agregar"; 
        // 
        $sentenciaSQL= $conexion -> prepare("INSERT INTO `muebles` (`Nombre`, `Imagen`, `TipoMueble`, `color`, `material`, `alto`,
         `ancho`, `profundidad`, `Descripcion`, `Stock`, `PrecioBase`) VALUES (:nombre, :imagen, 
         :tipomueble, :color, :material, :alto, :ancho,:profundidad, :descripcion, :stock, :preciobase);"); 
        $sentenciaSQL ->bindParam(':nombre',$txtNombre); 

        $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg"; 
        
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

        if($tmpImagen!="")
        {
                move_uploaded_file($tmpImagen,"../../Imagenes/".$nombreArchivo);
                
        }
        
        $sentenciaSQL ->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL ->bindParam(':tipomueble',$txtTipoMueble); 
        $sentenciaSQL ->bindParam(':color',$txtColor); 
        $sentenciaSQL ->bindParam(':material',$txtmaterial); 
        $sentenciaSQL ->bindParam(':alto',$txtalto);
        $sentenciaSQL ->bindParam(':ancho',$txtancho); 
        $sentenciaSQL ->bindParam(':profundidad',$txtprofundidad); 
        $sentenciaSQL ->bindParam(':descripcion',$txtDescripcion); 
        $sentenciaSQL ->bindParam(':stock',$txtStock); 
        $sentenciaSQL ->bindParam(':preciobase',$txtPrecioBase); 
        
        $sentenciaSQL -> execute();
        header("Location:productos.php");
    break;





    case "Modificar"; 
    $sentenciaSQL= $conexion -> prepare("UPDATE `muebles` SET `Nombre` =:nombre,`TipoMueble` = :tipomueble, 
    `color` = :color, `material` = :material, `alto` = :alto, `ancho` = :ancho, `profundidad` = :profundidad, `Descripcion` = :descripcion,
     `Stock` =:stock, `PrecioBase` = :preciobase WHERE idprod=:idprod");
    $sentenciaSQL ->bindParam(':nombre',$txtNombre);
    $sentenciaSQL ->bindParam(':tipomueble',$txtTipoMueble); 
    $sentenciaSQL ->bindParam(':color',$txtColor); 
    $sentenciaSQL ->bindParam(':material',$txtmaterial); 
    $sentenciaSQL ->bindParam(':alto',$txtalto);
    $sentenciaSQL ->bindParam(':ancho',$txtancho); 
    $sentenciaSQL ->bindParam(':profundidad',$txtprofundidad); 
    $sentenciaSQL ->bindParam(':descripcion',$txtDescripcion); 
    $sentenciaSQL ->bindParam(':stock',$txtStock); 
    $sentenciaSQL ->bindParam(':preciobase',$txtPrecioBase);
    $sentenciaSQL ->bindParam(':idprod',$txtID);
    $sentenciaSQL -> execute();



    if($txtImagen!=""){

        $fecha=new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg"; 
        $tmpImagen=$_FILES["txtImagen"]["tmp_name"];
       
        move_uploaded_file($tmpImagen,"../../Imagenes/".$nombreArchivo);

        $sentenciaSQL= $conexion->prepare("select imagen from muebles where idprod=:idprod");
        $sentenciaSQL ->bindParam(':idprod',$txtID);
        $sentenciaSQL -> execute();
        $mueble= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($mueble["imagen"])&& $mueble["imagen"]!="imagen.jpg"){

            if(file_exists("../../Imagenes/".$mueble["imagen"])){
                unlink("../../Imagenes/".$mueble["imagen"]);
            }
        }

    $sentenciaSQL= $conexion -> prepare("UPDATE  muebles SET imagen=:imagen where idprod=:idprod");
    $sentenciaSQL ->bindParam(':imagen',$nombreArchivo);
    $sentenciaSQL ->bindParam(':idprod',$txtID);
    $sentenciaSQL -> execute();
    }
    
    header("Location:productos.php");
    break;







    case "Cancelar"; 
     header("Location:productos.php");
    break;


    case "Seleccionar"; 
    $sentenciaSQL= $conexion -> prepare("select * from muebles where idprod=:idprod");
    $sentenciaSQL ->bindParam(':idprod',$txtID);
    $sentenciaSQL -> execute();
    $mueble= $sentenciaSQL->fetch(PDO::FETCH_LAZY);
    
    $txtNombre=$mueble['Nombre'];
    $txtImagen=$mueble['Imagen'];
    $txtTipoMueble=$mueble['TipoMueble'];
    $txtColor=$mueble['color'];
    $txtmaterial=$mueble['material'];
    $txtalto=$mueble['alto'];
    $txtancho=$mueble['ancho'];
    $txtprofundidad=$mueble['profundidad'];
    $txtDescripcion=$mueble['Descripcion'];
    $txtStock=$mueble['Stock'];
    $txtPrecioBase=$mueble['PrecioBase'];
    
    //echo "Presionado bototn sel"; 
    break;



    case "Borrar"; 


    $sentenciaSQL= $conexion->prepare("select imagen from muebles where idprod=:idprod");
    $sentenciaSQL ->bindParam(':idprod',$txtID);
    $sentenciaSQL -> execute();
    $mueble= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    if(isset($mueble["imagen"])&& $mueble["imagen"]!="imagen.jpg"){

        if(file_exists("../../Imagenes/".$mueble["imagen"])){
            unlink("../../Imagenes/".$mueble["imagen"]);
        }
    }

    
    
    $sentenciaSQL= $conexion -> prepare("delete from muebles where idprod=:idprod");
    $sentenciaSQL ->bindParam(':idprod',$txtID);
    $sentenciaSQL -> execute();
    //echo "Presionado bototn b"; 

    

    break;

    

    
}

$sentenciaSQL= $conexion -> prepare("select * from muebles");
$sentenciaSQL -> execute();
$listaMuebles= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>
<br/>
<br/><br/>



<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre </th>
            <th>Imagen</th>
            <th>Tipo de Mueble</th>
            <th>Color</th>
            <th>Material</th>
            <th>Alto</th>
            <th>Ancho</th>
            <th>Profundidad</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Precio Base</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php foreach($listaMuebles as $mueble) {?>

        <tr>
            <td ><?php echo $mueble ['idprod']; ?></td>
            <td><?php echo $mueble ['Nombre']; ?></td>
            <td><img class="img-thumbnail rounded" src="../../Imagenes/<?php echo $mueble ['Imagen']; ?>" width="150" alt=""></td>
            <td><?php echo $mueble ['TipoMueble']; ?></td>
            <td><?php echo $mueble ['color']; ?></td>
            <td><?php echo $mueble ['material']; ?></td>
            <td><?php echo $mueble ['alto']; ?></td>
            <td><?php echo $mueble ['ancho']; ?></td>
            <td><?php echo $mueble ['profundidad']; ?></td>
            <td><?php echo $mueble ['Descripcion']; ?></td>
            <td><?php echo $mueble ['Stock']; ?></td>
            <td><?php echo $mueble ['PrecioBase']; ?></td>
            


           
            <td>
                
          
            <form method="post">

            <input type="hidden" name="txtID" id="txtID" value="<?php echo $mueble['idprod']; ?>">
           
            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
            <input type="submit" name="accion" value="Borrar" class="btn btn-danger">

            </form>
        
            </td>

        </tr>
        

        <?php } ?>
    </tbody>
</table>
    
</div>


<div class="col-xs-10 col-md-5">

<style>
.Datos-formulario {
    width: 700px; /* Ancho personalizado */
    margin: 0 auto; /* Centrar horizontalmente */
}
</style>
    <div class="card Datos-formulario">
        <div class="card-header">
            Datos de Muebles
        </div>
        <div class="card-body">
            
            
            <form method="POST" enctype="multipart/form-data">

            <div class = "form-group">
            <label for="txtID">ID:</label>
            <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" placeholder="ID">
            </div>

            <div class = "form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" required class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" placeholder="Nombre">
            </div>

            <div class = "form-group">
                <label for="txtImagen">Imagen:</label>
                <br>
                <?php echo $txtImagen; ?>


                <?php 

                if($txtImagen!=""){?>

                <img class="img-thumbnail rounded" src="../../Imagenes/<?php echo $txtImagen; ?>" width="150" alt="">

                 <?php  }

                ?>
                <br>
                <input type="file"  class="form-control" name="txtImagen" placeholder="Imagen">
            </div>


            <div class = "form-group">
            <label for="txtTipoMueble">Tipo de Mueble:</label>
            <input type="text" required class="form-control" value="<?php echo $txtTipoMueble; ?>" name="txtTipoMueble" placeholder="TipoMueble">
            </div>

            <div class = "form-group">
            <label for="txtColor">Color:</label>
            <input type="text" required class="form-control" value="<?php echo $txtColor; ?>" name="txtColor" placeholder="Color">
            </div>

            <div class = "form-group">
            <label for="txtmaterial">Material :</label>
            <input type="text" required class="form-control" value="<?php echo $txtmaterial; ?>" name="txtmaterial" placeholder="Material">
            </div>

            <div class = "form-group">
            <label for="txtalto">Alto:</label>
            <input type="text" required class="form-control" value="<?php echo $txtalto; ?>" name="txtalto" placeholder="Alto">
            </div>

            <div class = "form-group">
            <label for="txtancho">Ancho:</label>
            <input type="text" required class="form-control" value="<?php echo $txtancho; ?>" name="txtancho" placeholder="Ancho">
            </div>

            <div class = "form-group">
            <label for="txtprofundidad">Profundidad:</label>
            <input type="text" required class="form-control" value="<?php echo $txtprofundidad; ?>" name="txtprofundidad" placeholder="Profundidad">
            </div>

            <div class = "form-group">
            <label for="txtDescripcion">Descripcion:</label>
            <input type="text" required class="form-control" value="<?php echo $txtDescripcion; ?>" name="txtDescripcion" placeholder="Descripcion">
            </div>

            <div class = "form-group">
            <label for="txtStock">Stock:</label>
            <input type="text" required class="form-control" value="<?php echo $txtStock; ?>" name="txtStock" placeholder="Stock">
            </div>

            <div class = "form-group">
            <label for="txtPrecioBase">Precio Base :</label>
            <input type="text" required class="form-control" value="<?php echo $txtPrecioBase; ?>" name="txtPrecioBase" placeholder="Preciobase">
            </div>




            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="accion" <?php echo($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Modificar"  class="btn btn-warning">Modificar</button>
                <button type="submit" name="accion" <?php echo($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
            </div>

        </form>

        </div>
        
    </div>



</div>


<?php include("../template/pie.php"); ?>