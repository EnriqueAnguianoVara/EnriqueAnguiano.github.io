<?php
session_start();
include('..\..\Conexion\conexion.php');
$usuario = $_SESSION['usu'];
$id = $_POST['Id'];

$sql="INSERT INTO carrito ( IdCliente, IdProducto ) VALUES (".$usuario.",".$id.");";
    $resultado=mysqli_query($con,$sql) or die('Error en el query database');
    mysqli_close($con);

header("Location: ".$_SERVER['HTTP_REFERER']."");
?>