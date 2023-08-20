<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\..\..\..\Conexion\conexion.php');
$datos = $con->query("SELECT * FROM cliente WHERE Usuario = '".$usuario."';");
while($tupla = mysqli_fetch_array($datos)){ 
        $idPropietario = $tupla['IdUsuario'];
}

$nombreProd=$_POST['nombre'];
$url=$_POST['urlImagen'];
$desc=$_POST['desc'];
$precio=$_POST['precio'];
$idSeccion=$_POST['seccion'];

$sql="INSERT INTO producto ( ImagenUrl,Nombre,Descripccion,Precio,IdPropietario,IdSeccion) VALUES ('".$url."','".$nombreProd."','".$desc."',".$precio.",".$idPropietario.",'".$idSeccion."');";
    $resultado=mysqli_query($con,$sql) or die('Error en el query database');
    mysqli_close($con);
    
header("location:..\..\..\cloudSea.php"); 
?>