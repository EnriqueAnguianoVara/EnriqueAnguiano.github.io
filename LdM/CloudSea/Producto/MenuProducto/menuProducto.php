<?php
session_start();
$usuario = $_SESSION['usuario'];
include('..\..\..\Conexion\conexion.php');
?>

<html>
    <head>
        <title>CloudSea: Producto: Menu</title>
        <meta>
        <link href="menuProducto.css" rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>


    <h2>Tus productos</h2>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripccion</th>
      <th scope="col">Modificar</th>
      <th scope="col">Retirar</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $sql = $con -> query("SELECT * FROM Producto p WHERE p.IdPropietario = ".$_SESSION['usu']."") or die("SELECT * FROM Producto WHERE p.IdPropietario = ".$_SESSION['usu']."");
        while ($producto = mysqli_fetch_array($sql)){
            ?>
            <tr>
                <th scope="row"><?php echo $producto['Id']?></th>
                <td><?php  echo $producto['Nombre']; ?></td>
                <td><?php  echo $producto['Precio']; ?></td>
                <td><?php  echo $producto['Descripccion']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificar">Modificar</button>
                    <div class="modal fade" tabindex="-1" id="modificar" aria-lebel="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modificar producto</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="alterProducto\alterProducto.php" method="post">
                                        <input type="hidden" name="Id" value="<?php echo $producto['Id'] ?>">
                                        <input type="text" placeholder="Nombre" name="Nombre" value="<?php echo $producto['Id'] ?>">
                                        <input type="text" placeholder="Descripccion" name="Descripccion" value="<?php  echo $producto['Descripccion']; ?>">
                                        <input type="number" placeholder="Precio" name="Precio" value="<?php  echo $producto['Precio']; ?>">
                                        <input type="number" placeholder="Seccion" name="Seccion">
                                        <input type="submit" class="btn btn-primary" value="Guardar cambios">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>    
                    <form action="deleteProducto\deleteProducto.php" method="post">
                        <input type="hidden" name="Id" value="<?php echo $producto['Id'] ?>">
                        <input type="submit" class="btn btn-primary" value="Retirar">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th scope="row">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevo"> Nuevo Producto </button>
            </th>
        </tr>
  </tbody>
</table>

<div class="modal fade" id="nuevo" tabindex="-1" aria-lebel="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo producto</h5>
        </div>
        <form action="nuevoProducto\addProducto.php" method="post">
        <div class="modal-body">
            <input type="text" placeholder="Nombre" name="nombre">
            <input type="text" placeholder="Url de la imagen" name="urlImagen">
            <input type="text" placeholder="Descripccion" name="desc">
            <input type="number" placeholder="Precio" name="precio">
            <input type="number" placeholder="Seccion" name="seccion">
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" value="Guardar cambios">
        </div>
        </form>
    </div>
   </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>