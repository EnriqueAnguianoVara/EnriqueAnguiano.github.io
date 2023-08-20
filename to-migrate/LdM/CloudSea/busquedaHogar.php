
<?php
session_start();
$_SESSION['buscador'] = "Hogar";
header("location: buscar.php");

?>