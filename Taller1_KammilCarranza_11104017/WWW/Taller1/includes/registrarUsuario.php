<html>
<head>
    <title>Registrando usuario</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    $correo =$_POST["correo"];
    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $contrasena =$_POST["pw"];
    $confirmacion=$_POST["confirmar"];
    include_once("database.php");

    /* Si el campo de contraseña coincide con el de confirmar contraseña, añade un usuario nuevo a la tabla usuarios.
    Si estos no coinciden muestra un mensaje de error y lo redirige a la pagina de registro*/
    if($contrasena==$confirmacion){
        $registrar="INSERT INTO usuariosTareas.usuarios
        (`correo`, `nombre`, `apellido`, `contrasena`) VALUES ('$correo','$nombre','$apellido','$contrasena')";

        $comunicacion= mysqli_query($con,$registrar);
        echo"<meta http-equiv='refresh' content='0.5;url=/Taller1/perfil.php?correo=".$correo."'>";
    }else{
        echo"<h2>Las contraseñas no son iguales, por favor vuelva a intentarlo</h2>";
        echo"<meta http-equiv='refresh' content='3;url=/Taller1/registro.php'>";
    }
    if($comunicacion == false)
    {
      echo "<h4>Error: ".mysqli_error($con)."</h4>";
  } 
  ?>
</body></html>