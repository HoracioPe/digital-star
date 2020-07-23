<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-8 col-md-offset-3">

<div class="table-responsive">
<table class="table table-bordered table-hover">
<form action="perfil_guardar.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th colspan="4" class="btn-warning"><h3> Formulario del Perfil</h3></th>

    </tr>
  </thead>
  <tbody>
  <?php
include("../conexion.php");
$ci    = $usuario; 
//hasta aqui es la variable  
$consulta ="SELECT * FROM dat_admin WHERE ci = '$ci' AND cargo='4' ";
if ($resultado=$link->query($consulta)) {
while($row = $resultado->fetch_assoc()) 
 {
  ?>
  <tr>
    <td colspan="4" class="warning"><input type="hidden" name="id" class="form-control" value="<?= stripslashes($row["id"]);?>"></td>
    </tr>
    <tr>
      <td>Apellido Paterno:</td>
      <td><input type="text" name="ap" class="form-control" value="<?= stripslashes($row["ap"]);?>"></td>
      <td>Apellido Materno:</td>
      <td><input type="text" name="am" class="form-control" value="<?= stripslashes($row["am"]);?>"></td>
    </tr>
    <tr>
      <td>Nombres:</td>
      <td><input type="text" name="nom" class="form-control" value="<?= stripslashes($row["nom"]);?>"></td>
     
    </tr>
    
    <td colspan="4" class="info"></td>
    </tr>
    <tr class="warning">
      <td>Código Usuario:</td>
      <td><input type="text" name="ci" class="form-control" value="<?= stripslashes($row["ci"]);?>"></td>
      
    </tr>
<

    <tr>
    <td colspan="4"><button type="submit" name="guardar" class="btn btn-danger glyphicon glyphicon-cloud-download"> GUARDAR CAMBIOS</button></td>
    </tr>
    <?php
}
}
    ?>
  </tbody>
  </form>
</table>
</div><!--fin de la tabla responsive-->

</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 