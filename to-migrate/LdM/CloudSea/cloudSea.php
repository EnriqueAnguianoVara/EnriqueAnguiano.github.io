<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\Conexion\conexion.php');
$datos = $con->query("SELECT * FROM cliente WHERE Usuario = '".$usuario."';");
while($tupla = mysqli_fetch_array($datos)){ 
        $correo = $tupla['Email'];
        $_SESSION['usu'] = $tupla['IdUsuario'];
        $nombre = $tupla['NombreUsu'];
        $apellido = $tupla['Apellidos'];
        $dom = $tupla['Domicilio'];
        $codPostal = $tupla['CodigoPostal'];
        $contr = $tupla['Contrasenya'];
        $email = $tupla['Email'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="cloudSea.scss" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    <title>CloudSea</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid justify-content-between">

    <div class="d-flex">
      <a class="navbar-brand me-2 mb-1 d-flex align-items-center" href="#">
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

<div class="modal" tabindex="-1" id="modal_cart" aria-lebel="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Carrito</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
        $datos = $con -> query("SELECT p.* FROM producto p INNER JOIN carrito c  WHERE p.Id = c.IdProducto AND c.IdCliente=".$_SESSION['usu'].";");
        if ($datos != NULL){
          $precio=0;
          while($tupla=mysqli_fetch_array($datos)){
            $precio += $tupla['Precio'];
            ?>  
            <p><?php echo $tupla['Nombre']?> : <?php echo $tupla['Precio'] ?>€</p>
            <?php
          }
          ?>
          <hr>
          <p>Total: <?php echo $precio ?>€</p>
          <?php
        }else{
          echo "Carrito vacío";
        }
        
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="Carrito/BorrarCarrito.php">Comprar productos</a>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="ajustes">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajustes de usuario</h5>
      </div>
      <form action="ajustesUsuario.php" method="post">
      <div class="modal-body">
        <input type="text" value="<?php echo $_SESSION['usuario']?>" name="usuario" placeholder="usuario">
        <input type="password" name="contr" value="<?php echo $contr?>" placeholder="Contraseña">
        <input type="text" value="<?php echo $nombre?>" name="nombre" placeholder="Nombre">
        <input type="text" value="<?php echo $apellido?>" name="ap" placeholder="Apelldio/s">
        <input type="text" value="<?php echo $email?>" name="email" placeholder="Email">
        <input type="text" value="<?php echo $codPostal?>" name="codP" placeholder="codigo postal">
        <input type="text" value="<?php echo $dom?>" name="dom" placeholder="Domicilio">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Guardar cambios">
      </form>
      <form action="borrarUsuario.php">
        <input type="submit" class="btn btn-secondary" value="Borrar Usuario ">
        </form>
      </div>
    </div>
  </div>
</div>

<h2>Secciones favoritas</h2>
<section class="seccion">
<div class="container" class="contenedor">
  <div class="row">
    <div class="col">
      <a href="busquedaHogar.php">
        <div class="row" id ="Hogar" >
          <h2>Hogar</h2>
        </div>
      </a>
      </div>
      <div class="col">
    <div class="container">
  <div class="row">
    <div class="col">
      <a href="busquedaGaiming.php">
      <div class="column" id="Gaiming">
        <h2>Gaiming</h2>
      </div>
      </a>
      <a href="busquedaEstudios.php">
      <div class="column" id="Estudios">
        <h2>Estudios</h2>
      </div>
      </a>
    </div>
    <div class="col">
    <a href="busquedaModa.php">
    <div class="column" id="Moda">
        <h2>Moda</h2>
      </div>
    </a>
      <a href="busquedaDeporte.php">
      <div class="column" id="Deporte">
        <h2>Deporte</h2>
      </div>
      </a>
    </div>
  </div>
      </div>
      </div>
    </div>
  </div>
      </div>
      </div>  
</section>
<h2>Productos destacados</h2>
<section class="producto1">

<div class="prod">
<?php
    $datos = $con -> query("SELECT p.*, c.* FROM producto p INNER JOIN Cliente c ON IdPropietario = IdUsuario ORDER BY Precio DESC LIMIT 4 ;");
    while ($tupla = mysqli_fetch_array($datos)){
?>
<form action="Carrito\carrito.php" method="post">
  <div class="card" style="width: 18rem;">
    <img src="..\IniciarSesion\FondoInicSesion.jpg" class="card-img-top" >
  <div class="card-body">  
    <h5 class="card-title" name="nombre" value="nombre"><?php echo $tupla['Nombre']?></h5>
    <p class="card-text"><?php echo $tupla['Descripccion'] ?></p>
    <p class="card-text">De: <?php echo $tupla['Usuario'] ?></p>
    <p class="card-text"><?php echo $tupla['Precio']?>€</p>
    <input type="hidden" name="Id" value="<?php echo $tupla['Id'] ?>"></>      
    <input type="submit" class="btn btn-primary" name="Comprar" value="Comprar" ></input>
    </form>
    
</div>
</div> 
<?php } ?>
    </div> 
</section>

<section class="noticias">
<h2>Noticias</h2>

<div id="coso" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#coso" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#coso" data-bs-slide-to="1" aria-label="Slide 2"></button>  </div>
  <div class="carousel-inner" id="general">
    <div class="carousel-item active">
      <img src="Noticias1.png" class="d-block w-100" alt="..." id="Imagen">
    </div>
    <div class="carousel-item">
      <img src="Noticias2.png" class="d-block w-100" alt="..." id="Imagen">
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#coso" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#coso" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </button>
  </div>
</div>
</section>

<h2>Precios tacaños modo tio Gilito</h2>

<section class="producto2">
<div class="prod">
    <?php
        $datos = $con -> query("SELECT p.*, c.* FROM producto p INNER JOIN Cliente c ON IdPropietario = IdUsuario ORDER BY Precio LIMIT 3 ;");
        while ($tupla = mysqli_fetch_array($datos)){
    ?>
    <form action="Carrito\carrito.php" method="post">
      <div class="card" style="width: 18rem;">
        <img src="..\IniciarSesion\FondoInicSesion.jpg" class="card-img-top" >
      <div class="card-body">  
        <h5 class="card-title" name="nombre" value="nombre"><?php echo $tupla['Nombre']?></h5>
        <p class="card-text"><?php echo $tupla['Descripccion'] ?></p>
        <p class="card-text">De: <?php echo $tupla['Usuario'] ?></p>
        <p class="card-text"><?php echo $tupla['Precio']?>€</p>
        <input type="hidden" name="Id" value="<?php echo $tupla['Id'] ?>"></>      
        <input type="submit" class="btn btn-primary" name="Comprar" value="Comprar" ></input>
        </form>
        
    </div>
    </div> 
    <?php } ?>
        </div> 
</section>


<h2>Siguenos</h2>

  <div class="hexagon-wrapper">
    <div class="hexagon">
      <i><img src="Rss.png"></i>
    </div>
  </div>
<footer>
    <li>CloudSea. Creado por Enrique Anguiano. Pagina educativa, no comercial.</li>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>