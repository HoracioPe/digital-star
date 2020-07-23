<?php
  include("../sesion.class.php");
  

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-3">
<?php

include("../conexion.php");


if (isset($_POST['guardar'])) {
$id=$_POST['id'];
$ap=$_POST['ap'];
$am=$_POST['am'];
$nom=$_POST['nom'];

$ci=$_POST['ci'];


$modificar="UPDATE dat_admin SET ap='$ap', am='$am', nom='$nom',  ci='$ci' WHERE id='$id' ";
//$modificar1="UPDATE examen SET autor='$ci' ";
if ($resultado=$link->query($modificar)) {
  echo "Contraseña Modificado Exitosamente ";
  echo "<a href ='../jefe.php'> Salir para inciar sesión con la nueva contraseña </a>";
  
 }
 
 else{
  echo "Error al modificar el Contraseña ";
  echo "<a href ='perfil.php'> REGRESAR </a>";
 }


}

?>
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='index.php'> REGRESAR </a>";
}
?> 