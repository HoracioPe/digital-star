<!doctype html>
<html lang="Es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Administracion WEB">


    <title>Administración</title>

    <!-- Bootstrap core CSS -->
    <link rel="icon" href="../IconoAdmin.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/css/fontawesome-all.css" crossorigin="anonymous">
    <script defer src="../fonts/js/fontawesome-all.js"></script>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
    
<style>
  /*.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
 /* Set the fixed height of the footer here */
 /* Vertically center the text there 

}*/
.footer {

width: 100%;
position: fixed; /* Fija el contenedor a una posición */
bottom: 0px; /* El div se sitúa abajo */
z-index: 10; /* Lo muestra por encima de otros div */

 }

</style>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="#">Hola: Administrador </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php"> <i class="fas fa-home"></i> Principal<span class="sr-only">(current)</span></a>
          </li>



          <li class="nav-item dropdown active"><!-- cambie aqui en esta linea y la de abajo la class-->
            <a class="nav-link dropdown-toggle btn btn-outline-warning p-2 ml-2" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i> Categorias</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="eva_categoria.php"><i class="fas fa-tag"></i> Crear Materia</a>
              <a class="dropdown-item" href="eva_colegio.php"><i class="fas fa-briefcase"></i> Nuevo Colegio</a>
              <hr>
              <a class="dropdown-item" href="usuario_new.php"><i class="fal fa-user-secret"></i> Nuevo Usuario</a>
              <a class="dropdown-item" href="usuario_foto.php"><i class="fal fa-image"></i> Mi perfil</a>
              <a class="dropdown-item" href="perfil.php"><i class="fal fa-image"></i> Cambio Contraseña</a>
              
            </div>
          </li>
          <br>

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-primary p-2 ml-2" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-edit"></i>  Evaluaciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="eva_nueva.php"><i class="fas fa-pencil-alt"></i> Crear Evaluación</a>
              <a class="dropdown-item" href="index.php"><i class="far fa-file-alt"></i> Ver Evaluaciones</a>
            </div>
          </li>
           <!-- __________________________________________________->

          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-danger p-2 ml-2" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-edit"></i>  Configuración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="fondo_principal.php"><i class="fas fa-pencil-alt"></i> Fondo principal</a>
              <a class="dropdown-item" href="index.php"><i class="far fa-file-alt"></i> Fondo Administrador</a>
            </div>
          </li>
 <!-- __________________________________________________->-->


         <!-- <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle btn btn-outline-success ml-3" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-file-word"></i> Trabajos</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="crear_trabajos.php"><i class="fas fa-file-alt"></i> Crear Trabajos</a>
              <a class="dropdown-item" href="trabajos.php"><i class="fas fa-file-word"></i> Ver Trabajos</a>
            </div>
          </li>

          <li class="nav-item dropdown active">
            <a href="foros.php" class="nav-link dropdown-toggle btn btn-outline-warning ml-3" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-comments"></i> Foros</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="crear_foros.php"><i class="far fa-comment"></i></i> Crear Foros</a>
              <a class="dropdown-item" href="foros.php"><i class="far fa-comments"></i> Ver Foros</a>
            </div>
          </li>-->


        </ul>

        <form class="form-inline my-2 my-lg-0">
<!--le añadi esto para la foto de perfil del administrador en el encabezado-->
<?php
include("../conexion.php");
$consulta="SELECT id,ap,am,nom,ci,foto FROM dat_admin  WHERE ci='$usuario' AND cargo='$cargo'  ";
if ($resultado=$link->query($consulta)) {
  while ($row=$resultado->fetch_assoc()) {
     $id=$row['id'];
     $foto=$row['foto'];
     $aps=$row['ap'];
     $ams=$row['am'];
     $noms=$row['nom'];

}}
?>
<div class="img"  style="max-width: 50px;"   >
<?php 
if ($foto=='') {

 echo "<img src='../estudiantes/fotos/avatar_maestro.jpg' class='rounded-circle' width='60px;' height='60px' >";
}else{

 echo "<img src='/xampp/star/estudiantes/fotos/".$foto."'  class='rounded-circle' width='60px;' height='60px'; > ";

}

?>
<style>
img {
border: 3px solid grey;
margin: 0;
padding: 0;
border-radius: 800px;
overflow: hidden;
}
</style>

<!--Hata aqui lo de la imagen de perfil  -->  
              
  </div>
      <a class="nav-link btn-danger active" href="../cerrarsesion.php" style="margin-left: 30px"><i class="fas fa-sign-out-alt"></i> Cerrar</a>
    </form>

      </div>
    </nav>
<div class="container">
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


<!--<ul class="dropdown-menu" role="menu">
            <li><a href="eva_categoria.php"><img src="../iconos/add.png"> Crear Categoria</a></li>
            <li><a href="eva_colegio.php"><img src="../iconos/application_home.png"> Añadir Colegio</a></li>
            <li><a href="nuevo.php"><img src="../iconos/icon-16-user-dd.png"> Nuevo Alumno</a></li>
            <li><a href="eva_nueva.php"><img src="../iconos/publish_g.png"> Crear Evaluación</a></li>
            <li><a href="eva_mostrar.php"><img src="../iconos/book_open.png"> Ver Evaluaciones</a></li>  
          <li><a href="ver_registros.php" ><img src="../iconos/icon-16-contacts.png"> Ver Registrados</p></a></li>
        <li><a href="../cerrarsesion.php" ><p class="rojo"> Cerrar Sesión</p></a></li>                     
          </ul>-->