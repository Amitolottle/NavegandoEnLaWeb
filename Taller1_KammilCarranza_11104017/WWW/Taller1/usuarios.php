<html>
<head>
  <title>Notas de estudiantes</title>
  <meta charset="UTF-8">
</head>


<body>
  <h1>Seleccione un usuario de la lista</h1>
  <?php

  include_once("includes/database.php");
  $correo =$_POST["correo"];

  /*Selecciona a todos los usuarios que difieren del correo entregado, ordenandolos por apellido
  luego los pinta en forma de lista*/
  $sql= "SELECT * FROM usuariosTareas.usuarios WHERE usuarios.correo!='$correo' ORDER BY apellido";
  $result = mysqli_query($con,$sql);
  if($result == false)
  {
    echo "<h4>Error: ".mysqli_error($con)."</h4>";
  } else
  {
    if(mysqli_num_rows($result) < 1)
    {
      echo "<p>No current databases</p>";
    } else
    {

      //Al hacer click en un correo envía este correo en particular para mostrar el perfil de ese usuario
      while($row = mysqli_fetch_array($result)) {
        echo "<a href='perfilUsuarios.php?correo=".$row["correo"]."'>".$row["correo"]."</a> ".$row["nombre"]." ".$row["apellido"];
        echo"<br>";
        echo"<br>";
      }
    }
  }

  //Regresa al usuario a su perfil
  echo "<h3>Regresa a tu perfíl <a href='perfil.php?correo=".$correo."'>".'Aqui'."</a></h3>";
  ?>
</body></html>