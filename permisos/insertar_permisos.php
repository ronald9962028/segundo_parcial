<?php 
require_once('../conexion.php');

echo $usuario = $_POST['usuario'];

echo $rol = $_POST['rol'];

$sql = "insert into permisos values (null,'$usuario','$rol')";

$result =  $conn->query($sql);

if (!$result) die('Error al insertar');
header('Location: ../permisos.php');
?>