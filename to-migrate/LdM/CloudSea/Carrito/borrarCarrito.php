<?php
session_start();
include('..\..\Conexion\conexion.php');    
$sql="DELETE FROM carrito WHERE IdCliente = ".$_SESSION['usu'].";";
    $resultado=mysqli_query($con,$sql) or die($sql);
    mysqli_close($con);

header("Location: ".$_SERVER['HTTP_REFERER']."");
?>