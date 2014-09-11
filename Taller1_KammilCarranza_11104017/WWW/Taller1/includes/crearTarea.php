<html>
<head>
  <title>Registrando usuario</title>
  <meta charset="UTF-8">
</head>


<body>
  <?php
  $prioridad =$_POST["prioridad"];
  $fechaIni =$_POST["fechaIni"];
  $fechaLim =$_POST["fechaLim"];
  $descripcion=$_POST["descripcion"];
  $correo =$_POST["correo"];
  include_once("database.php");

  //Haciendo uso delos datos sumministrados, añade una tarea a la tabla de tareas
  $tarea="INSERT INTO usuariosTareas.tareas
  (`idTarea`, `prioridad`, `creacion`, `finalizacion`, `descripcion`) VALUES ('','$prioridad','$fechaIni','$fechaLim','$descripcion')";
  $agregar= mysqli_query($con,$tarea);

  //Luego selecciona la ultima tarea de estas, que fue la que se acabó de añadir
  $ultimaTarea="SELECT * From usuariosTareas.tareas ORDER BY tareas.idTarea DESC LIMIT 1";
  $ultima= mysqli_query($con,$ultimaTarea);

  /*Luego crea una nueva tareaDeUsuario (que es la tabla de relacion entre tareas y usuarios) en base a la tarea que se acabó de añadir
  y en base al correo que se había mandado como oculto en la página de perfilUsuario.*/
  while($row = mysqli_fetch_array($ultima)) {
   $tareaDelUsuario="INSERT INTO usuariosTareas.tareasDeUsuarios
   (`idTarea`, `correoUsuario`, `prioridadTarea`) VALUES ('$row[idTarea]','$correo','$prioridad')";
   $agregarTareaDelUsuario=mysqli_query($con,$tareaDelUsuario);
 }

 // Por ultimo, redirige al usuario al perfil del usuario al que le añadió la tarea.
 echo"<meta http-equiv='refresh' content='1;url=/Taller1/perfilUsuarios.php?correo=".$correo."'>";
 
 if($comunicacion == false)
 {
  echo "<h4>Error: ".mysqli_error($con)."</h4>";
} 
?>

</body></html>