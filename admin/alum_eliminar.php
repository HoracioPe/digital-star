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
<!--desde aqui el SI-->
<table class="table table-bordered table-hover">

<form action="alum_eliminarx.php" method="post">
  <thead>
  <?php 


include("../conexion.php");

$id_alumno=$_GET['id'];
 //$consulta="SELECT titulo FROM examen WHERE id='$id' ";
 //$consulta="SELECT nom FROM dat_admin WHERE id='$id_alumno' ";
 $consulta="SELECT nom FROM dat_admin WHERE id='$id_alumno' ";
 if ($resultado=$link->query($consulta)) {
   while ($row=$resultado->fetch_assoc()) {
     $nom=$row['nom'];
   }
 }

?>
    <tr>
      <th class="danger"><h3> ¿Estas Seguro que deseas ELIMINAR <b>PERMANENTEMENTE</b>  el alumno: <em>" <?php echo $nom;?> ? " </em></h3></th>

    </tr>
  </thead>
  <tbody>

<tr>

      <td><input type="hidden" name="id"  value="<?php echo $id_alumno;?>"></td>
        
</tr>

    <tr>
    <td>
      <a href="index.php"><button type='button' class='btn btn-info'><i class="fas fa fa-reply fa-2x"></i></button></a>
    <button type="submit" class="btn btn-lg  btn-danger"><i class="fas fa-trash-alt"></i> SI, ELIMINAR >>>> </button></td>
    </tr>
    </tbody>
  </form>
</table>
<!--hasta aqui el SI-->
</div><!--fin de la tabla responsive-->
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 