<?php 
include("../conexion.php");
$id_alumno=$_POST['id'];
$modificar="DELETE FROM dat_admin WHERE id='$id_alumno' LIMIT 1";
if ($resultado=$link->query($modificar)) {
	header("Location: index.php");
}else{
	echo "Error al borrar de la Base de Datos ";
}


?>