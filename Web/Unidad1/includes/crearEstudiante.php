<html>
<head>
    <title>Sumario de todas las notas</title>
    <meta charset="UTF-8">
</head>


<body>
<!-- /*Recibe información de la pagina de estuiantes, la cual pide mediante_POST y usando esta información, agrega un nuevo
estudiante a la base de datos. Adicionalmente lo re-direcciona a la página de estudiantes una vez ha creado el estudiante*/ -->
    <meta http-equiv="refresh" content="1;url=/Web/Unidad1/estudiantes.php">
    <?php
    $codigo =$_POST["codigo"];
    $nombre =$_POST["nombre"];
    $apellido =$_POST["apellido"];
    $correo =$_POST["correo"];
    include_once("database.php");
    $registrar="INSERT INTO estudiantesWeb.estudiantes
    (`codigo`, `nombre`, `apellido`, `correo`) VALUES ('$codigo','$nombre','$apellido','$correo')";
    $comunicacion= mysqli_query($con,$registrar);
    //header()
   //$registro = mysqli_query($con,$registrar));
    ?>
</body></html>