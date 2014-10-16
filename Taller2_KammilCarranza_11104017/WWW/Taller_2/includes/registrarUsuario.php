<?php session_start(); ?>
<html>
<head>
    <title>Registrando usuario</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    $nombres =$_POST["nombres"];
    $correo =$_POST["correo"];
    $pw =$_POST["pw"];
    $confirmacion=$_POST["confirmarPw"];
    include_once("database.php");

    /* Si el campo de contraseña coincide con el de confirmar contraseña, añade un usuario nuevo a la tabla usuarios.
    Si estos no coinciden muestra un mensaje de error y lo redirige a la pagina de login*/
    if($pw==$confirmacion){
        $registrar="INSERT INTO tiendaVirtual.usuarios
        (`correo`, `nombre`, `contrasena`, `rutaImagen`) VALUES ('$correo','$nombres','$pw', 'images/default.png')";
        $comunicacion= mysqli_query($con,$registrar);

        //Luego selecciona el último usuario que se acabó de añadir
        $ultimoUsuario="SELECT usuarios.id AS idUsuario From tiendaVirtual.usuarios ORDER BY usuarios.id DESC LIMIT 1";
        $ultimo= mysqli_query($con,$ultimoUsuario);
        while($row=mysqli_fetch_array($ultimo)){
           $_SESSION["username"] = $row["idUsuario"];
       }
       echo"<meta http-equiv='refresh' content='0.5;url=/Taller_2/index.php'>";
   }else{
    echo"<h2>Las contraseñas no son iguales, por favor vuelva a intentarlo</h2>";
    echo"<meta http-equiv='refresh' content='6;url=/Taller_2/login.php'>";
}
if($comunicacion == false)
{
  echo "<h4>Error: ".mysqli_error($con)."</h4>";
} 
?>
</body></html>