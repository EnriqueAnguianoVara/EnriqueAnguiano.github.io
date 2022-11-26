
<?php
session_start();
$busqueda = $_SESSION['buscador'];
$usuario = $_SESSION['usuario'];
include('..\Conexion\conexion.php');
$datos = $con->query("SELECT * FROM cliente WHERE Usuario = '".$usuario."';");
while($tupla = mysqli_fetch_array($datos)){ 
    $correo = $tupla['Email'];
}
#Falta el union (Para buscar además con la descripcción).
$datos = $con->query("SELECT p.* FROM Producto p INNER JOIN Seccion s ON p.IdSeccion = s.IdSeccion WHERE p.Nombre LIKE '%$busqueda%' OR s.Seccion='".$busqueda."';") or die('<h1>Error 420/69. No mola que utilizes inyeccion sql malicionsa :(');?>

<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="buscar.css" rel="stylesheet" type="text/css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

            <title>CloudSea: Busqueda de <?php $busqueda ?></title>
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid justify-content-between">

    <div class="d-flex">
      <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="cloudSea.php">
        <img
          src="..\IniciarSesion\CloudSea.png"
          height="35"
          loading="lazy"
          style="margin-top: 1px;"
        />
      </a>
    </div>

    <ul class="navbar-nav flex-row d-none d-md-flex">
              
      <form class="d-flex" action="buscarPrincipal.php" method="post" >
        <input id="buscador" class="form-control me-2" type="search" placeholder="Buscar productos" aria-label="Search" name="buscador">
        <button class="btn btn-outline-success" type="submit" >Buscar</button>
      </form>
    </ul>
    
    <ul class="navbar-nav flex-row">

    <li class="nav-item me-3 me-lg-1">
        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart">
          <i>Carrito</i>
        </a>
      </li>


      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Producto\MenuProducto\menuProducto.php">Tus productos</a></li>
            <li>
            <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ajustes">
              Ajustes de usuario
            </a>
          
          </li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar sesion</a></li>
          </ul>
        </li>
      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link d-sm-flex align-items-sm-center">
           <?php echo $usuario.' | '.$correo; ?>
        </a>
      </li>
    </ul>  
  </div>
</nav>


            <h5>Busquedas relacionadas</h5>
        <?php while($tupla = mysqli_fetch_array($datos)){ ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..\IniciarSesion\FondoInicSesion.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tupla['Nombre']; ?></h5>
                            <p class="card-text"> <?php echo $tupla['Precio']; ?>€</p>
                            <p class="card-text"><small class="text-muted"><a href="#" class="btn btn-primary">Ir a producto</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        </body>
        </html>
