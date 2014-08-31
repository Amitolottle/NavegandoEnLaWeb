<html>
<head>
	<title>Sumario de todas las notas</title>
	<meta charset="UTF-8">
</head>


<body>

	<h1>Tabla de notas</h1>
	<?php
/* Program: mysql_test.php
* Desc: Connects to MySQL Server and * outputs settings.
*/

include_once("includes/database.php");
$sql= " SELECT estudiantes.nombre AS nombre,  estudiantes.apellido AS apellido, estudiantes.codigo AS codigo  FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo GROUP BY estudiantes.nombre";
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

		echo"<table border='1' style='width:300px'>";
		echo"<th>Nombre</th>";
		$sqlNombreNotas="SELECT * FROM estudiantesWeb.notas";
		$nombreNotas= mysqli_query($con,$sqlNombreNotas);
		while($notasConNombre = mysqli_fetch_array($nombreNotas)){
			echo"<th>".$notasConNombre["nombre"]."</th>";
		}
		

		while($row = mysqli_fetch_array($result)) {
			echo"<tr>";
			echo"<td>"."<a href='includes/mostrarNota.php?codigo=".$row["codigo"]."'>".$row["nombre"]."  ".$row["apellido"]."</a> "."</td>";

			$sqlNotas= "SELECT estudiantes.codigo AS codigo, notasdeestudiantes.valor AS valorNota FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo JOIN estudiantesWeb.notas ON notasdeestudiantes.idNota=notas.idNota ";
			$notas= mysqli_query($con,$sqlNotas);
			while($datosNotas = mysqli_fetch_array($notas)){
				if($row["codigo"]==$datosNotas["codigo"]){
					echo"<td>".$datosNotas["valorNota"]."</td>";
				}
  //print(implode(" , ",$));
			}
			echo"</tr>";
		}

		echo"</table>";
	}
} ?>

<h2>Ver Listado del curso</h2>
<section>
	<form action="estudiantes.php">
		<input type="submit" value="Ir al listado de estudiantes">
	</form>
</section>
</body></html>