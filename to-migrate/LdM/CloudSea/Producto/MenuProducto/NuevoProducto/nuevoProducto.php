<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\..\..\..\Conexion\conexion.php');
$datos = $con->query("SELECT * FROM cliente WHERE Usuario = '".$usuario."';");
while($tupla = mysqli_fetch_array($datos)){ 
        $idPropietario = $tupla['IdUsuario'];
        $correo = $tupla['Email'];
}
?>

<html>
    <head>
        <title></title>
        <meta>
        <link href="nuevoProducto.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <nav>
        <ul class="menu">
            <li>
                <div class="Logotipo"><img src="..\..\..\..\IniciarSesion\CloudSea.png" width="200"></div>
            </li>
            <li>
                <div class="usuario">
                    <p><?php echo $usuario?></p> <hr> <p><?php echo $correo ?></p>
                </div>
                <ul class="submenu">
                    <li>
                        <form action="..\..\..\cloudSea.php">
                            <input type="submit" value="Pagina principal">
                        </form>
                    </li> 
                    <li>
                        <form action="..\..\..\CSUsuario\configUsuario.php">
                            <input type="submit" value="Ajustes de cuenta">
                        </form>
                    </li> 
                    <li>
                        <form action="..\..\..\cerrarSesion.php">
                            <input type="submit" value="Cerrar sesion">
                        </form>
                    </li> 
                </ul>
                </div>
            </li>
        </ul>
    </nav>

    <form action="addProducto.php" class="formulario" method="post">
        <input type="text" class="nombre"  placeholder="Nombre" name="nombre">
        <input type="text" class="urlImagen" placeholder="url de la imagen" name="urlImagen">
        <input type="text" class="desc" placeholder="descripcion del producto" name="desc">
        <input type="text" class="precio" placeholder="precio del producto" name="precio">
        <input type="text" class="seccion" placeholder="Indica el tipo de seccion" name="seccion">

        <input type="submit" value="Crear producto">
    </form>
    </body>
</html>