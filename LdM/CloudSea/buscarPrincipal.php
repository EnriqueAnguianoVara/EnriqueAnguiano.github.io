<?php
session_start();
$_SESSION['buscador'] = $_POST['buscador'];
header("location: buscar.php");

?>