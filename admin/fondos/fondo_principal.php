<?php 
  include("../sesion.class.php");
$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') { ?>
<?php include("top-admin.php");?>

<div class="container">
	<div class="row d-flex justify-content-center">
		<div class="col-5 col-md-5 mt-4 bg-primary p-3">
			<div class="form form-group">
			<form action="fondox_principal.php" method="post" enctype="multipart/form-data">
 <table>
 <tr>
 <td>
 <label for="imagen">Imagen:</label></td>
 <td><input type="file" name="imagen" size="20"></td></tr>
 <tr><td colspan="2" style="text-alingn_center"><input type="submit" value="Actualizar"> </td></tr>
 </table>
 </form>
			</div>
		</div>
	</div>
</div>



	<!--=== End Sticky Footer ===-->
<?php include("footer-admin.php");?>
<?php  }else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href ='../index.php' > REGRESAR </a>";
}?>