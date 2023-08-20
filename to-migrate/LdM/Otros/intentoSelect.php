<?php
    $con= mysqli_connect('localhost','root','','lenguajedemarcas') or die('Error en la conexion del servidor :(');
    $datos = $con->query("SELECT * FROM cliente WHERE usuario =".$usuario.";");
?>
<table border="1px">
    <thead>
        <th>Id</th>
        <th>Usuario</th>
        <th>Contrasenya</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Domicilio</th>
        <th>CodigoPostal</th>
    </thead>
    <tbody>
        <?php while($tupla = mysqli_fetch_array($datos)){ ?>
            <tr>
                <td><?php echo $tupla['Id'] ?></td>
                <td><?php echo $tupla['Usuario'] ?></td>
                <td><?php echo $tupla['Contrasenya'] ?></td>
                <td><?php echo $tupla['Nombre'] ?></td>
                <td><?php echo $tupla['Apellidos'] ?></td>
                <td><?php echo $tupla['Email']?></td>
                <td><?php echo $tupla['Domicilio']?></td>
                <td><?php echo $tupla['CodigoPostal']?></td>
            </tr>
        <?php } ?>
        <?php mysqli_close($con); ?>
    </tbody>
</table> 