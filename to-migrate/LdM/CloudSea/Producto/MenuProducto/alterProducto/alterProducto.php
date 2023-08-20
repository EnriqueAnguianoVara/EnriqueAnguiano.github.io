<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\..\..\..\Conexion\conexion.php');
$id = $_POST['Id'];
$nombre = $_POST['Nombre'];
$desc = $_POST['Descripccion'];
$precio = $_POST['Precio'];
$seccion = $_POST['Seccion'];

$sql="UPDATE producto SET Nombre='".$nombre."' ,Descripccion= '".$desc."' ,Precio=".$precio." ,IdSeccion=".$seccion."  WHERE Id = ".$id."";
    $resultado=mysqli_query($con,$sql) or die("Error en la databalse");
    mysqli_close($con);
header("location: ..\menuProducto.php");
?>
