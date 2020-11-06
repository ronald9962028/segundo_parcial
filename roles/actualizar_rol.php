<?php 
require_once('../conexion.php');

$id = $_POST['id'];
$roles = $_POST['roles'];

$sql = "UPDATE roles SET descripcion='$roles' WHERE id='$id'";

$result =  $conn->query($sql);

if (!$result) die('Error al insertar');
header('Location: ../roles.php');
?>