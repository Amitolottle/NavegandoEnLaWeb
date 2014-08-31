<html>
<head>
  <title>Notas de estudiantes</title>
  <meta charset="UTF-8">
</head>


<body>
  <h1>Lista de estudiantes</h1>
  <?php
/* Program: mysql_test.php
* Desc: Connects to MySQL Server and * outputs settings.
*/

include_once("includes/database.php");

//Queary encargado de seleccionar todos los estudiantes y orderalos por apellido
$sql= "SELECT * FROM estudiantesWeb.estudiantes ORDER BY apellido";
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

  	/*Aqui se le agrega al codigo el valor de link, además de enviar dicho codigo a otra pagina llamada "mostrarNota" 
  	para ser analizado por ella y así tomar las acciones requeridas. Por otro lado acquí se agrega la información
  	del estudiante*/
    while($row = mysqli_fetch_array($result)) {
      echo "<a href='includes/mostrarNota.php?codigo=".$row["codigo"]."'>".$row["codigo"]."</a> ".$row["nombre"]." ".$row["apellido"]." ".$row["correo"];
      echo"<br>";
      echo"<br>";
    }
  }
} ?>

<!-- /*Se encarga de enviar información del estudiante (escrita por el usuario en campos de texto) a una pagina que se encarga
de subir esta información a la base de datos*/ -->
<h2>Agregar nuevo estudiante:</h2>
<section>
  <form action="includes/crearEstudiante.php" method="POST">
    <label>Codigo</label><input type="text" name="codigo"><br />
    <label>Nombre</label><input type="text" name="nombre"><br />
    <label>Apellido</label><input type="text" name="apellido"><br />
    <label>Correo</label><input type="text" name="correo"><br />
    <input type="submit" value="Enviar">
  </form>
</section>

<!-- /*Acción para enviar al usuario a la página con todas las notas*/ -->
<h2>Ver tabla de notas</h2>
<section>
  <form action="notasdeestudiantes.php">
   <input type="submit" value="Ir al sumario de notas">
 </form>
</section>
</body></html>