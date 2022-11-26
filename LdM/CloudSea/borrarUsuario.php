<?php 
session_start();
include('..\Conexion\conexion.php');

$sql="DELETE FROM cliente WHERE IdUsuario = ".$_SESSION['usu']."";
    $resultado=mysqli_query($con,$sql) or die($sql);
    mysqli_close($con);
header("location: cerrarSesion.php");
?>