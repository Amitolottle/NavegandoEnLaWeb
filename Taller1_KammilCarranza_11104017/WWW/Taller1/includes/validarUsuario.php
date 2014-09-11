<html>
<head>
    <title>Validando usuario...</title>
    <meta charset="UTF-8">
</head>


<body>
    <?php
    $correo =$_POST["correo"];
    $pw =$_POST["pw"];
    include_once("database.php");

    //Selecciona de toda la tabla de usuarios el usuario que coincida con el correo y constrseña entregados por index
    $validar="SELECT * FROM usuariosTareas.usuarios WHERE usuarios.correo='$correo' AND usuarios.contrasena='$pw'";
    $usuarioValido = mysqli_query($con,$validar);


    /*Si no agrego ninguna fila que coincidiera con lo anterior, envia un mensaje de error y lo redirecciona a index
    de lo contrario, lo envia al perfil de ese usuario seleccionado*/
    if(mysqli_num_rows($usuarioValido) < 1)
    {
        echo "<h1>¡Sus datos no coinciden con algún usuario registrado!</h1>";
        echo "<h2>Asegurese de haber digitado bien sus datos</h2>";
        echo "<h2>Si no tiene una cuenta debe crear una</h2>";
        echo "<h3>En un momento será redireccionado</h3>";
        echo"<meta http-equiv='refresh' content='6;url=/Taller1/index.php'>";
    }

    else{
        echo"<meta http-equiv='refresh' content='0.5;url=/Taller1/perfil.php?correo=".$correo."'>";
    }
    ?>
</body></html>