<html>
<head>
	<title>Tabla de notas</title>
	<meta charset="UTF-8">
</head>


<body>

	<?php
	include_once("database.php");
	if(isset($_GET["codigo"])){
		$codigo = $_GET["codigo"];

		$sql= " SELECT estudiantes.nombre AS nombre,  estudiantes.apellido AS apellido, estudiantes.codigo AS codigo  FROM estudiantesWeb.notasdeestudiantes JOIN estudiantesWeb.estudiantes ON notasdeestudiantes.codigoEstudiante=estudiantes.codigo WHERE estudiantes.codigo='$codigo' GROUP BY estudiantes.nombre";
		$result = mysqli_query($con,$sql);

		if(mysqli_num_rows($result) < 1)
		{
			echo "<h1>El estudiante no tiene notas para mostrar</h1>";
		}

		else{

			echo"<table border='1' style='width:300px'>";
			echo"<th>Codigo</th>";
			echo"<th>Nombre</th>";
			$sqlNombreNotas="SELECT * FROM estudiantesWeb.notas"; 

			$nombreNotas= mysqli_query($con,$sqlNombreNotas);
			while($notasConNombre = mysqli_fetch_array($nombreNotas)){
				echo"<th>".$notasConNombre["nombre"]."</th>";
			}

			while($row = mysqli_fetch_array($result)) {
				echo"<tr>";
				echo"<td>".$codigo."</td>";
				echo"<td>".$row["nombre"]." ".$row["apellido"]."</td>";


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

		}

		echo"</table>";
	}else{
      //
	}
    //header()
   //$registro = mysqli_query($con,$registrar));
	?>

	<section>
	<form action="/Web/Unidad1/estudiantes.php">
		<input type="submit" value="Regresar al listado de estudiantes">
	</form>
</section>
</body></html>