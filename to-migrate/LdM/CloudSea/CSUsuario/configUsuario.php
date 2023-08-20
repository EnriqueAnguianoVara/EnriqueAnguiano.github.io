<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\..\Conexion\conexion.php');
$datos = $con->query("SELECT * FROM cliente WHERE Usuario = '".$usuario."';");
while($tupla = mysqli_fetch_array($datos)){ 
        $correo = $tupla['Email'];
}
?>

<html>
    <head>
        <title>CloudSea: Producto: Menu</title>
        <meta>
        <link href="configUsuario.css" rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav>
        <ul class="menu">
            <li>
                <div class="Logotipo"><img src="..\..\IniciarSesion\cloudSea.png" width="200"></div>
            </li>
            <li>
                <div class="usuario">
                    <p><?php echo $usuario?></p> <hr> <p><?php echo $correo ?></p>
                </div>
                <ul class="submenu">
                    <li>
                        <form action="..\cloudSea.php">
                            <input type="submit" value="Pagina principal">
                        </form>
                    </li> 
                    <li>
                        <form action="..\Producto\MenuProducto\menuProducto.php">
                            <input type="submit" value="Tus Productos">
                        </form>
                    </li> 
                    <li>
                        <form action="..\cerrarSesion.php">
                            <input type="submit" value="Cerrar sesion">
                        </form>
                    </li> 
                </ul>
                </div>
            </li>
        </ul>
    </nav>

    <div class="opcion">
            <a href="alterUsuario\alterUsuario.php"><div class="alterUsuario"><img class="opcion" src="modificarUsuario.png"/></div></a>
            <a href="deleteUsuario\deleteUsuario.php"><div class="deleteUsuario"><img class="opcion"src="borrarUsuario.png"/></div></a>
    </div>  
    </body>
</html>