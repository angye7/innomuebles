
<?php
define("KEY","develoteca");
define("COD","AES-128-ECB");


$host = "localhost"; 
$bd="sitio";
$usuario="root"; 
$contrasenia="";

try {
    $conexion= new PDO("mysql:host=$host;dbname=$bd",$usuario, $contrasenia);
if($conexion){echo "";}



} catch (Exception $ex) {
    echo $ex-> getMessage();
    //throw $th;
}

?>