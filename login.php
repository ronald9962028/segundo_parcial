<?php 
session_start();
require_once('conexion.php');

$usuario = $_POST['usuario'];
$password = md5($_POST['password']);

$sql =  "select * from usuarios where usuario = '$usuario' and clave='$password' limit 1";

$result = $conn->query($sql);
if (!$result) die('Error al seleccionar');

if ($result->num_rows > 0){
    $fila = $result->fetch_array();
    $_SESSION["login"] = "OK";
    $_SESSION["usuario"] = $usuario;
    header('Location: inicio.php');
}
else{
    header('Location: index.html');
}
?>