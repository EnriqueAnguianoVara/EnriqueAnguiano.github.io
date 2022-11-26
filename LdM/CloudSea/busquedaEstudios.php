
<?php
session_start();
$_SESSION['buscador'] = "Estudios";
header("location: buscar.php");

?>