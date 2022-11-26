<?php
session_start();
$id = $_POST['Id'];
include('..\..\..\..\Conexion\conexion.php');
$sql="DELETE FROM producto WHERE Id = ".$id."";
    $resultado=mysqli_query($con,$sql) or die("Error en la databalse");
    mysqli_close($con);

header("location: ..\menuProducto.php")
?>
