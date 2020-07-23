<?php
  include("../sesion.class.php");
  include("../conexion.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="row d-flex justify-content-center">
<div class="col-md-6">
<?php
$id=$_GET['id'];
$consulta="SELECT id,titulo,categoria FROM examen WHERE id='$id' ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_assoc()) {
    $titulo=$row['titulo'];
    $categoria=$row['categoria'];
  }
}


?>
<h3> Buscar Estudiantes (Selecciona el grupo de estudiantes a aplicar el exámen)</h3>
<hr>
<form action="eva_partx.php" method="get">

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-home"></i></span>
  </div>
  <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
<select name="colegio" class="form-control">
<?php
$buscar="SELECT colegio FROM dat_admin WHERE ci='$usuario' AND cargo='$cargo' ";
if ($resul=$link->query($buscar)) {
  while ($row=$resul->fetch_array()) {
    $colegio=$row['colegio'];
    echo "<option value='".$colegio."'>".$colegio."</option>"; 
  }
}
?>  
</select>

</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-newspaper"></i></span>
</div>
<select name="nivel" class="form-control">
<option value="PRIMARIA">PRIMARIA</option> 
<option value="SECUNDARIA">SECUNDARIA</option> 
<option value="PREPARATORIA">PREPARATORIA</option> 
<option value="SUPERIOR">SUPERIOR</option> 
</select>
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-window-restore"></i></span>
</div>
<select name="curso" class="form-control">
 <option value="PRIMERO">PRIMERO</option> 
 <option value="SEGUNDO">SEGUNDO</option>
 <option value="TERCERO">TERCERO</option>
 <option value="CUARTO">CUARTO</option>
 <option value="QUINTO">QUINTO</option>
 <option value="SEXTO">SEXTO</option>
 <option value="SEPTIMO">SÉPTIMO</option>
 <option value="OCTAVO">OCTAVO</option> 
 <option value="NOVENO">NOVENO</option>
 <option value="DECIMO">DECIMO</option>
 <option value="DECIMO">ONCEAVO</option>
</select>
</div>


<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-archive"></i></span>
</div>
<select name="paralelo" class="form-control">
<option value="A">A</option> 
<option value="B">B</option> 
<option value="C">C</option> 
<option value="D">D</option> 
<option value="E">E</option> 
</select>
</div>

<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text bg-primary text-white" id="basic-addon1"><i class="fas fa-archive"></i></span>
</div>
<select name="gestion" class="form-control">
    <option value="2020">2020</option> 
    
</select>
</div>


 <div class="text-center">
<a href="index.php"><button type='button' class='btn btn-info'><i class="fas fa fa-reply fa-3x"></i></button></a> || 
<button class="btn btn-secondary px-5 py-3 rounded-0"> <i class="fas fa fa-search fa-1x"></i> Buscar</button>
</div>
</form>

</div>
</div>
<?php

include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 