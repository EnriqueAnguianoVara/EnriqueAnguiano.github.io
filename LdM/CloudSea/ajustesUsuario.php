<?php
session_start();
include('..\Conexion\conexion.php');
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['ap'];
$email = $_POST['email'];
$codPostal = $_POST['codP'];
$dom = $_POST['dom'];
$contr = $_POST['contr'];

$sql="UPDATE cliente SET Usuario= '".$usuario."', Contrasenya ='".$contr."' ,NombreUsu='".$nombre."' , Apellidos= '".$apellido."' ,Email='".$email."' , Domicilio='".$dom."',CodigoPostal=".$codPostal."  WHERE IdUsuario = ".$_SESSION['usu']."";
    $resultado=mysqli_query($con,$sql) or die($sql);
    mysqli_close($con);
header("location: cerrarSesion.php");

?>