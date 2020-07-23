
  
<?php
  include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="row d-flex justify-content-between">
<div class="col-md-5">
<body style="background:-webkit-gradient(linear, 80% 20%, 10% 21%, from(#33CC33), to(#FF9900))";>
  <!-- Categoria es MATERIA-->

<h2>Lista de Materias</h2>
<table class="table table-striped table-bordered table-hover">
<form action="eva_categoriax.php" method="post" >
    <tr class="success">
      <td>N#</td>
      <td>Lista de Materias</td>
      <td>Eliminar</td>
    </tr>
<?php 
include("../conexion.php");

$consulta="SELECT * FROM categoria ";
if ($resultado=$link->query($consulta)) {
$numero=1;
    while ($row=$resultado->fetch_array()) {
        $id=$row['id'];
        $categoria=$row['categoria'];

    echo "<tr>";
    echo "<td>".$id."</td>";
    echo "<td>".$categoria."</td>";
    echo "<td><a href='cate_eliminar.php?id=$id'><button type='button' class='btn btn-danger' data-toggle='tooltip' data-placement='bottom' title='Eliminar'><i class='fas fa-trash-alt'></i></button></a></td>";
    echo "</tr>";       
$numero++;
    }
}




 ?>    
    </form>
</table>

</div>

<div class="col-md-5">
<h2>Nueva Materia</h2>
<table class="table table-striped table-bordered table-hover">
<form action="eva_categoriax.php" method="post" >
    <tr>
      <td>Escriba la nueva Materia</td>
      <td><input type="text" name="categoria" class="form-control" required></td>
    </tr>
     <tr>
        <td></td>
         <td><button type="submit" class="btn btn-success glyphicon glyphicon-plus-sign"> <i class="fa fa-plus-square" ></i> CREAR</button></td>
     </tr>
</form>
</table>
</div>

</div><!--cierra el ROW-->
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 
</body>
