<?php
include("../sesion.class.php");

$sesion=new sesion();
$cargo=$sesion->get("cargo");
$usuario=$sesion->get("usuario");
if ($cargo=='4') {
  
include("top-admin.php");
?>
<div class="col-md-12">

<div class="table-responsive">

<table class="table table-bordered table-hover">
<?php
include("../conexion.php");
//hasta aqui es la variable  
$categoria=$_GET['categoria'];
$titulo=$_GET['titulo'];
$consulta ="SELECT * FROM examen WHERE categoria='$categoria' AND titulo='$titulo' ";
if ($resultado=$link->query($consulta)) {
while($row = $resultado->fetch_assoc()) {
$categoria=$row['categoria'];
$titulo=$row['titulo'];
$estado=$row['estado'];
$bimestre=$row['bimestre'];
$gestion=$row['gestion'];
$fecha_final=$row['fecha_final'];
$tiempo=$row['tiempo'];
$id=$row['id'];
$rand=$row['rand'];

}
}
  ?>

<form action="evaluacionx.php" method="post" enctype="multipart/form-data">
  <thead>
    <tr>
      <th colspan="4" ><h3> Formulario de la Evaluación</h3></th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="warning">Materia:
      </td>
      <td>
        <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
        <input type="text" name="categoria" class="form-control" value="<?php echo utf8_decode($categoria);?>" readonly="readonly"></td>
      <td class="warning">Título:</td>
       <td><input type="text" name="titulo" class="form-control" value="<?php echo utf8_decode($titulo);?>" readonly="readonly"></td>
</tr>

<tr>
      
        <td class="warning">Estado:</td>
        <td><select name="estado" class="form-control">
          <option value="<?php echo $estado;?>"><?php echo $estado;?></option>
          <option value="Publicado">Publicado</option>
          <option value="Despublicado">No</option>
        </select></td>
        <td class="warning">Cuatrimestre:</td>
        <td><select name="bimestre" class="form-control">
          <option value="<?php echo $bimestre;?>"><?php if($bimestre=='1BIM'){echo "1° Cuatrimestre";}elseif($bimestre=='2BIM'){echo "2° Cuatrimestre";}
          elseif($bimestre=='3BIM'){echo "3° Cuatrimestre";}elseif($bimestre=='4BIM'){echo "4° Cuatrimestre";}elseif($bimestre=='5BIM'){echo "5° Cuatrimestre";}
          elseif($bimestre=='6BIM'){echo "6° Cuatrimestre";}elseif($bimestre=='7BIM'){echo "7° Cuatrimestre";}elseif($bimestre=='8BIM'){echo "8° Cuatrimestre";}
          elseif($bimestre=='9BIM'){echo "9° Cuatrimestre";}elseif($bimestre=='10BIM'){echo "10° Cuatrimestre";}elseif($bimestre=='11BIM'){echo "11° Cuatrimestre";}?></option>
          <option value="1BIM">1° Cuatrimestre</option>
          <option value="2BIM">2° Cuatrimestre</option>
          <option value="3BIM">3° Cuatrimestre</option>
          <option value="4BIM">4° Cuatrimestre</option>
          <option value="5BIM">5° Cuatrimestre</option>
          <option value="6BIM">6° Cuatrimestre</option>
          <option value="7BIM">7° Cuatrimestre</option>
          <option value="8BIM">8° Cuatrimestre</option>
          <option value="9BIM">9° Cuatrimestre</option>
          <option value="10BIM">10° Cuatrimestre</option>
          <option value="11BIM">11° Cuatrimestre</option>
          

        </select></td>
</tr>
<tr>

        <td>Tiempo del Examen<br> X pregunta:</td>
        <td><select name="tiempo" class="form-control">
          <option value="<?php echo $tiempo;?>"><?php echo $tiempo." min";?></option>
          <option value="1">1 min</option>
          <option value="2">2 min</option>
          <option value="3">3 min</option>
          <option value="4">4 min</option>
          <option value="5">5 min</option>
          <option value="10">10 min</option>
          <option value="30">30 min</option>
          <option value="50">50 min</option>

        </select></td>
        <td class="danger">Fecha  final del Examen:</td>
        <td><input type="date" name="fecha_final" class="form-control" value="<?php echo $fecha_final;?>" ></td>
</tr>
<tr>

        <td>Total Preguntas al AZAR:</td>
        <td><select name="rand" class="form-control">
          <option value="<?php echo $rand;?>"><?php echo $rand;?></option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="20">20</option>
          <option value="25">25</option>
          <option value="30">30</option>
          <option value="35">35</option>
          <option value="40">40</option>
          <option value="50">50</option>

        </select></td>
        
</tr>

    </tbody>
<tr>
<td colspan="4">
<h3>  
<a href="index.php"><button type='button' class='btn btn-info'><i class="fas fa fa-reply fa-3x"></i></button></a>
<button type="submit" class="btn btn-dark" ><i class="far fa-save fa-3x"></i></button>
  </form> 
<?php 
echo "<a href='preguntas.php?id=$id&categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-success' ><i class='far fa fa-plus-circle fa-3x'></i></button></a>";
?>
</h3>
</td>
</tr>
<?php
$numero=1;
$buscar="SELECT * FROM preguntas WHERE id_examen='$id' ";
$res=$link->query($buscar);
while ($row=$res->fetch_array()) {
$id_preguntas=$row['id_preguntas'];
$id_examen=$row['id_examen'];
$A=$row['A'];
$B=$row['B'];
$C=$row['C'];
$D=$row['D'];
$resp=$row['resp'];
$preg=$row['preg'];

echo "<tr>";
echo "<td>Pregunta ".$numero.":</td>";
echo "<td>".$preg."</td>";
//Esto lo agregue para que actualizara el numero de pregunta en la base de datos cuando se eliminara la pregunta
$sSQL="UPDATE preguntas SET numero='$numero' Where id_preguntas='$id_preguntas'";
$resultado=$link->query($sSQL);
//para que no mostrara en blanco la pregunta al hacer el examen
echo "<td colspan='2'><strong><font style='color:red;'>Respuesta Correcta: ".$resp."</font></strong><br> a) ".$A."<br> b) ".$B."<br> c) ".$C."<br> d) ".$D." <br> <a href='evaluacion_preg.php?id_preguntas=$id_preguntas&categoria=$categoria&titulo=$titulo'><button type='button' class='btn btn-danger'>Eliminar Pregunta</button></a></td>";

echo"</tr>";

$numero++;
}


?>
<!--<tr>
  http://localhost/tics/admin/evaluacion.php?id=&categoria=Lenguaje&titulo=El%20Verbo
      <td>Pregunta 1:</td>
      <td><textarea name="preg" class="form-control" rows="3"></textarea></td>
      <td><br>Escriba la Respuesta:</td>
      <td>
      <input type="text" name="resp" class="form-control" placeholder="Escriba la respuesta igual al inciso correcto..." style="background-color:#FD0664;color:#ffffff;"><br>
      <input type="text" name="A" class="form-control" placeholder="Escriba la respuesta del inciso A" required><br>
      <input type="text" name="B" class="form-control" placeholder="Escriba la respuesta del inciso B" required><br>
      <input type="text" name="C" class="form-control" placeholder="Escriba la respuesta del inciso C" required><br>
      <input type="text" name="D" class="form-control" placeholder="Escriba la respuesta del inciso D" required></td>
      
</tr> -->





</table>



</div><!--fin de la tabla responsive-->
<!--<font class="alert alert-danger" style="font-size:17px;"> Se le Recomienda Realizar las <b>10 Preguntas</b> con sus Respuestas para el Buen Funcionamiento del SISTEMA gracias</font>-->
</div>
<?php
include("footer-admin.php");

}else{
  echo "No eres Administrador y No tienes Permiso para ver esta pagina ";
  echo "<a href='index.php'> REGRESAR </a>";
}
?> 