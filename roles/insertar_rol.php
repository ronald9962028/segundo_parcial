<?php 
require_once('../conexion.php');

$rol = $_POST['rol'];

$sql = "insert into roles values (null,'$rol')";

$result =  $conn->query($sql);

if (!$result) die('Error al insertar');
header('Location: ../roles.php');
?>