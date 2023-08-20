<?php
$usuario=$_POST['usuario'];
$contr=$_POST['contrasenya'];
session_start();
$_SESSION['usuario']=$usuario;

#Incluyo la conexion de la carpeta de conexion
include('..\Conexion\conexion.php');

$consulta="SELECT * FROM cliente WHERE usuario='".$usuario."' AND contrasenya='".$contr."';";
$resultado=mysqli_query($con,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas){
    header("location:..\CloudSea\cloudSea.php");
}else{
    ?>
    <?php
    include("IniciarSesion.html")
    ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($con);
?>