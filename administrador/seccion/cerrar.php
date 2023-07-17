<?php





session_start();
$_SESSION=[];
session_destroy();
print_r($_SESSION);

header("Location:../index.php");
//http://localhost/ProyectoTesis2/administrador/
?>