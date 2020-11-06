<?php 
require_once('../conexion.php');

echo $id =$_GET["id"];
$sql ="DELETE FROM roles where id=$id";
$result =$conn->query($sql);
if(!$result) die ("ERROR AL ELIMINAR UN REGISTRO");
header("Location: ../roles.php");
?>