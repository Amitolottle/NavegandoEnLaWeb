
<!-- Se crea la sesión mediante este metodo. Con ella espero
poder acceder al id que se le pasó desde login en las 
paginas que sea necesario. -->
<?php session_start(); ?>

<html>
<head>
    <title>Validando usuario...</title>
    <meta charset="UTF-8">
</head>


<body>

<!--  Se pasa el id que llegó desde login para validar si este usuario existe
   en la base de datos -->
   <?php
   $id =$_POST["id"];
   include_once("database.php");
   $validar="SELECT usuarios.idUsuario AS idUsuario FROM Mensajeria_Web.usuarios WHERE usuarios.idUsuario='$id'";
   $usuarioValido = mysqli_query($con,$validar);


    /*Si no encontró ningún usuario arroja un mensaje de error y
    redirecciona al usuario a la pagina de login. Sí encuentra al usuario
    pasa a darle el id de este usuario al objeto de sesión y lo redirige
    al index */
    if(mysqli_num_rows($usuarioValido) < 1)
    {
        echo "<h1>¡Sus datos no coinciden con algún usuario registrado!</h1>";
        echo "<h2>Asegurese de haber digitado bien sus datos</h2>";
        echo "<h2>Si no tiene una cuenta debe crear una</h2>";
        echo "<h3>En un momento será redireccionado</h3>";
        echo"<meta http-equiv='refresh' content='6;url=/Clase_web_Semana 8/login.php'>";
    }

    else{
        $_SESSION["username"] = "$id";
        echo"<meta http-equiv='refresh' content='0.5;url=/Clase_web_Semana 8/index.php'>";
    }
    ?>
</body></html>