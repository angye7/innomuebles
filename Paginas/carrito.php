<?php
session_start();

$mensaje="";


if(isset($_POST['btnAccion'])){
    switch ($_POST['btnAccion']){

        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="OK ID correcto".$ID."<br/>";
            }else{

                $mensaje.="Upss. ID incorrecto".$ID."<br/>";
            }


            if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="OK NOMBRE".$NOMBRE."<br/>";
            }else{

                $mensaje.="Upss. nombre incorrecta".$NOMBRE."<br/>";
            }


            if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="OK cantidad".$CANTIDAD."<br/>";
            }else{

                $mensaje.="Upss. cantidad incorrecta".$CANTIDAD."<br/>";
            }


            if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="OK precio correcto".$PRECIO."<br/>";
            }else{

                $mensaje.="Upss. precio incorrecto".$PRECIO."<br/>";
            }




          if(!isset($_SESSION['CARRITO'])){
                $mueble=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO

                );

                $_SESSION['CARRITO'][0]=$mueble;

                $mensaje="Producto agregado al carrito";

        }else{

            $idProductos=array_column($_SESSION['CARRITO'],"ID");

            if(in_array($ID,$idProductos)){

                echo "<script> alert ('El producto ya ha sido seleccionado...'); </script>";
                $mensaje="";
            }else{
            
                $NumeroProductos=count($_SESSION['CARRITO']);
                $mueble=array(
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO

                );
                $_SESSION['CARRITO'][$NumeroProductos]=$mueble;


                $mensaje="Producto agregado al carrito";

           }
        }

      // $mensaje=print_r($_SESSION,true);

         $mensaje="Producto agregado al carrito";
       
        break;

        
        case "Eliminar";

            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);

                foreach ($_SESSION['CARRITO'] as $indice => $mueble) {
                    if($mueble['ID']==$ID){

                        unset($_SESSION['CARRITO'][$indice]);

                        echo "<script>alert('Elemento borrado...'); </script>";
                        
                    }
                }
                $mensaje.="OK ID correcto".$ID."<br/>";
            }else{

                $mensaje.="Upss. ID incorrecto".$ID."<br/>";
            }

        break;

    }


}


?>