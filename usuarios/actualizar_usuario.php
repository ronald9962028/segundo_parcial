<?php 
require_once('../conexion.php');

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$pass = md5($_POST['pass']);

$sql = "UPDATE usuarios SET usuario='$usuario', correo='$correo', clave='$pass' WHERE id='$id'";

$result =  $conn->query($sql);

if (!$result) die('Error al insertar');
header('Location: ../usuarios.php');
?>