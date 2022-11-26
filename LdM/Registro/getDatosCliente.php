<?php
    include('..\Conexion\conexion.php');
    $sql="INSERT INTO cliente ( Usuario,Contrasenya,NombreUsu,Apellidos,Email,Domicilio,CodigoPostal ) VALUES ('".$_POST["usuario"]."','".$_POST["contrasenya"]."','".$_POST["nombre"]."','".$_POST["apellido"]."','".$_POST["email"]."','".$_POST["domicilio"]."',".$_POST["codPostal"].");";
    $resultado=mysqli_query($con,$sql) or die('Error en el query database');
    mysqli_close($con);

    header("location:..\IniciarSesion\IniciarSesion.html");
?>