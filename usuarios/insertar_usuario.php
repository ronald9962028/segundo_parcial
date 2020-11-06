<?php
require_once('../conexion.php');


$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$pass = md5($_POST['pass']);



$sql = "INSERT INTO usuarios VALUES (null,'$usuario','$correo','$pass')";
$consulta = mysqli_query($conn, $sql);

if (!$consulta) {
    die('falla en la consulta.' . mysqli_error($conn));
    header('Location: ../usuarios.php');
}
else {
    header('Location: ../usuarios.php');
} 

?>