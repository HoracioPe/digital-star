<?php 
include("../conexion.php");
$id=$_POST['id'];
$modificar="DELETE FROM categoria WHERE id='$id' LIMIT 1";
if ($resultado=$link->query($modificar)) {
	header("Location: eva_categoria.php");
}else{
	echo "Error al borrar de la Base de Datos ";
}


?>