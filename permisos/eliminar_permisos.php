<?php 
require_once('../conexion.php');

echo $id =$_GET["id"];
$sql ="DELETE FROM permisos where id=$id";
$result =$conn->query($sql);
if(!$result) die ("ERROR AL ELIMINAR UN REGISTRO");
header("Location: ../permisos.php");
?>